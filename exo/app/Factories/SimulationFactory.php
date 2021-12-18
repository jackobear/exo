<?php

namespace App\Factories;

class SimulationFactory
{
    public static function buildSimulationList()
    {
        $simulationCollection = collect();
        $paramRanges = [
            "vps_to_win" => [16],
            "vps_per_colony" => [2],
            "vps_per_exocolony" => [7],
            "exocolony_cost" => [10],
            "strat" => ['sandbag', 'ignore_spaceport', 'sandbag_ignore', 'build_to_strike', 'rockhopper', 'rockbag'],
            "colony_limit" => [4],
            "spaceport_limit" => [2]
        ];
        $paramIndices = array_fill(0, 7, 0);

        /*
        $paramIndices = [0,0];
        $paramRanges = [
            [1,2],
            [3,4]
        ];
        // [[1,3], [1,4], [2,3], [2,4]]

        // galaxy brain
        function buildParams($paramIndex){
            foreach($paramRanges[$paramIndex] as $rangeIndex => $rangeValue){
                $pastRange = $rangeIndex < count($paramRanges[$paramIndex]);

                if(!$pastRange){
                    $simulationCollection->push($this->buildSimulation([
                        $paramRanges[0][$paramIndices[0]],  $paramRanges[1][$paramIndices[1]] ...
                    ]));
                    $paramIndices[$paramIndex]++;
                } else {
                    $paramIndices[$paramIndex] = 0;
                }
            }

            $pastLastParam = $paramIndex < count($paramRanges);
            if(!$pastLastParam){
                buildParams($paramIndex+1);
            }
        }
        buildParams(0);
        */

        // caveman
        foreach($paramRanges['vps_to_win'] as $vps_to_win){
            foreach($paramRanges['vps_per_colony'] as $vps_per_colony){
                foreach($paramRanges['vps_per_exocolony'] as $vps_per_exocolony){
                    foreach($paramRanges['exocolony_cost'] as $exocolony_cost){
                        foreach($paramRanges['strat'] as $strat){
                            foreach($paramRanges['colony_limit'] as $colony_limit){
                                foreach($paramRanges['spaceport_limit'] as $spaceport_limit){
                                    $simulationCollection->push(SimulationFactory::buildSimulation([
                                        "vps_to_win" => $vps_to_win,
                                        "vps_per_colony" => $vps_per_colony,
                                        "vps_per_exocolony" => $vps_per_exocolony,
                                        "exocolony_cost" => $exocolony_cost,
                                        "strat" => $strat,
                                        "colony_limit" => $colony_limit,
                                        "spaceport_limit" => $spaceport_limit
                                    ]));
                                }
                            }
                        }
                    }
                }
            }
        }

        return $simulationCollection;
    }

    public static function buildSimulation($params)
    {
        $sim = [
            "prod" => 2,
            "store" => 0,
            "vps" => 1 + $params['vps_per_colony'],
            "col_count" => 2,
            "sp_count" => 0,
            "exo_count" => 0
        ];
        $spaceport_cost = 3;
        $params['turns_til_victory'] = 0;
        $player_states = [];

        if($params['strat'] == 'rockbag' || $params['strat'] == 'rockhopper'){
            $params['exocolony_cost'] = 3;
            $params['vps_per_exocolony'] = 3;
        }
        $ignore_sp = false;
        if($params['strat'] == 'ignore_spaceport' || $params['strat'] == 'sandbag_ignore'){
            $ignore_sp = true;
        }
        $sandbag = false;
        if($params['strat'] == 'sandbag' || $params['strat'] == 'rockbag'){
            $sandbag = true;
        }        

        for($turn=2;$turn<20;$turn++){
            $sim['store'] += $sim['prod'];
            $player_states[$turn] = $sim;
            $player_states[$turn]['action'] = '';
            $striking_distance = $params['vps_to_win'] <= ($sim['vps'] + $params['vps_per_exocolony']);
            if($params['strat'] == 'build_to_strike' && $striking_distance){
                $sandbag = true;
                $ignore_sp = true;
            }

            $rockhopper_ready = true;
            if($params['strat'] == 'rockbag' && $sim['prod'] < 5){
                $rockhopper_ready = false;
            }

            if($sim['store'] >= $params['exocolony_cost'] && $sim['col_count'] < $params['colony_limit'] && ($params['strat'] != 'rockbag' || ($params['strat'] == 'rockhopper' && $rockhopper_ready))){
                $sim['store'] -= $params['exocolony_cost'];
                $sim['vps'] += $params['vps_per_exocolony'];
                $sim['exo_count'] += 1;
                $sim['col_count'] += 1;
                $player_states[$turn]['action'] = 'exo';
                if($params['strat'] == 'rockhopper' || $params['strat'] == 'rockbag') $sim['prod'] += 0.4;
            }
            if(!$sandbag || $sim['exo_count'] > 0){
                $colony_cost = $sim['sp_count'] > 0 ? 3 : 4;
                $can_afford_sp = $sim['store'] >= $spaceport_cost;
                $can_afford_first_sp = $can_afford_sp && $sim['sp_count'] === 0 && !$ignore_sp;
                if($can_afford_first_sp){
                    $sim['store'] -= $spaceport_cost;
                    $sim['vps'] += 1;
                    $sim['sp_count'] += 1;
                    $sim['col_count'] -= 1;
                    $player_states[$turn]['action'] .= ' sp1';
                }
                if($sim['store'] >= $colony_cost && $params['colony_limit'] >= ($sim['col_count'] + 1) && ($sim['sp_count'] === 1 || $ignore_sp)){
                    $sim['store'] -= $colony_cost;
                    $sim['prod'] += 1;
                    $sim['vps'] += $params['vps_per_colony'];
                    $sim['col_count'] += 1;
                    $player_states[$turn]['action'] .= ' col';
                }
            }
            $can_afford_sp = $sim['store'] >= $spaceport_cost;
            if($sim['col_count'] === $params['colony_limit'] && $can_afford_sp && $sim['sp_count'] < $params['spaceport_limit']){
                $sim['store'] -= $spaceport_cost;
                $sim['vps'] += 1;
                $sim['sp_count'] += 1;
                $sim['col_count'] -= 1;
                $player_states[$turn]['action'] .= ' sp2';
            }
            if($sim['vps'] >= 16 && $params['turns_til_victory'] === 0){
                $params['turns_til_victory'] = $turn;
                $player_states[$turn] = $sim;
                break;
            }
        }
        $params['remainder'] = $sim['store'];
        $params['details'] = json_encode($player_states);

        return $params;
    }

}