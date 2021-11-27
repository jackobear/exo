<?php

namespace App\Factories;

class SimulationFactory
{
    public static function buildSimulationList()
    {
        $simulationCollection = collect();
        $paramRanges = [
            "vps_to_win" => [16],
            "vps_per_colony" => [1, 1.8],
            "vps_per_exocolony" => [5, 6, 7],
            "exocolony_cost" => [8, 9, 10],
            "sandbag" => [true, false],
            "ignore_spaceport" => [false, true],
            "colony_limit" => [4],
            "spaceport_limit" => [2],
            "rockhopper" => [false, true]
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
                        foreach($paramRanges['sandbag'] as $sandbag){
                            foreach($paramRanges['ignore_spaceport'] as $ignore_spaceport){
                                foreach($paramRanges['colony_limit'] as $colony_limit){
                                    foreach($paramRanges['spaceport_limit'] as $spaceport_limit){
                                        foreach($paramRanges['rockhopper'] as $rockhopper){
                                            $simulationCollection->push(SimulationFactory::buildSimulation([
                                                "vps_to_win" => $vps_to_win,
                                                "vps_per_colony" => $vps_per_colony,
                                                "vps_per_exocolony" => $vps_per_exocolony,
                                                "exocolony_cost" => $exocolony_cost,
                                                "sandbag" => $sandbag,
                                                "ignore_spaceport" => $ignore_spaceport,
                                                "colony_limit" => $colony_limit,
                                                "spaceport_limit" => $spaceport_limit,
                                                "rockhopper" => $rockhopper
                                            ]));
                                        }
                                    }
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
        $spaceport_cost = 5;
        $params['turns_til_victory'] = 0;
        $player_states = [];

        $rockbag = false;
        if($params['rockhopper']){
            $params['exocolony_cost'] = 3;
            $params['vps_per_exocolony'] = 3;
            if($params['sandbag']) $rockbag = true;
        }

        for($turn=2;$turn<20;$turn++){
            $sim['store'] += $sim['prod'];
            $player_states[$turn] = $sim;
            $striking_distance = $params['vps_to_win'] <= $sim['vps'] + $params['vps_per_exocolony'];

            $rockhopper_ready = true;
            if($rockbag && $sim['prod'] < 5){
                $rockhopper_ready = false;
            }

            if($sim['store'] >= $params['exocolony_cost'] && $sim['col_count'] < $params['colony_limit'] && (!$params['rockhopper'] || ($params['rockhopper'] && $rockhopper_ready))){
                $sim['store'] -= $params['exocolony_cost'];
                $sim['vps'] += $params['vps_per_exocolony'];
                $sim['exo_count'] += 1;
                $sim['col_count'] += 1;
                if($params['rockhopper']) $sim['prod'] += 0.4;
            }
            if(!$params['sandbag'] || $sim['exo_count'] > 0){
                $colony_cost = $sim['sp_count'] > 0 ? 3 : 4;
                $can_afford_sp = $sim['store'] >= $spaceport_cost;
                $can_afford_first_sp = $can_afford_sp && $sim['sp_count'] === 0 && !$params['ignore_spaceport'];
                if($can_afford_first_sp){
                    $sim['store'] -= $spaceport_cost;
                    $sim['vps'] += 1;
                    $sim['sp_count'] += 1;
                    $sim['col_count'] -= 1;
                }
                if($sim['store'] >= $colony_cost && $params['colony_limit'] > ($sim['col_count'] + 1) && ($sim['sp_count'] === 1 || $params['ignore_spaceport'])){
                    $sim['store'] -= $colony_cost;
                    $sim['prod'] += 1;
                    $sim['vps'] += $params['vps_per_colony'];
                    $sim['col_count'] += 1;
                }
                if($sim['col_count'] === $params['colony_limit'] && $can_afford_sp && $sim['exo_count'] > 0){
                    $sim['store'] -= $spaceport_cost;
                    $sim['vps'] += 1;
                    $sim['sp_count'] += 1;
                    $sim['col_count'] -= 1;
                }
            }
            if($sim['vps'] >= 16 && $params['turns_til_victory'] === 0){
                $params['turns_til_victory'] = $turn;
                break;
            }
        }
        $params['remainder'] = $sim['store'];
        $params['details'] = json_encode($player_states);

        return $params;
    }

}