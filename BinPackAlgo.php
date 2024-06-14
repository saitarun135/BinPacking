<?php

const BEST_FIT = 'best_fit';
/*
|--------------------------------------------------------------------------
| Bin Packing Algo
|--------------------------------------------------------------------------
| uses Best Fit Approach Data.
| $binData accepts Bin size.
| $itemsToFit accepts how many garbage bags with their sizes.
*/
    
function binPackAlgo($binData, $itemsToFit, $algoType = BEST_FIT)
{
    if($algoType == 'best_fit')
    {
        /** sorting for best fit */
        usort($itemsToFit,function($a,$b){
            return $b['size'] <=> $a['size'];
        });

        foreach($binData as &$bin)
        {
            $fitItems = [];
            $remaining_bin_space = $bin['binSize'];
            foreach($itemsToFit as $key =>  $fitPiece)
            {
                if($fitPiece['size'] <= $remaining_bin_space)
                {
                    $fitItems[] = $fitPiece; 
                    unset($itemsToFit[$key]);
                    $remaining_bin_space -= $fitPiece['size'];
                    if($remaining_bin_space > 0)
                        continue;
                    else
                        break;
                }
            }
            $bin['remainingBin'] = $remaining_bin_space;
            $bin['fitData'] = $fitItems;
        }
        $binData['unFitPieces'] = $itemsToFit;
        print_r($binData);
    }
}

// Large dataset for testing
$binData = [
    ['binSize' => 10, 'name' => 'A'],
    ['binSize' => 20, 'name' => 'B'],
    ['binSize' => 10, 'name' => 'C'],
    ['binSize' => 25, 'name' => 'D'],
    ['binSize' => 30, 'name' => 'E'],
    ['binSize' => 15, 'name' => 'F'],
    ['binSize' => 18, 'name' => 'G'],
    ['binSize' => 22, 'name' => 'H'],
    ['binSize' => 12, 'name' => 'I'],
    ['binSize' => 14, 'name' => 'J'],
    ['binSize' => 28, 'name' => 'K'],
    ['binSize' => 35, 'name' => 'L'],
    ['binSize' => 19, 'name' => 'M'],
    ['binSize' => 25, 'name' => 'N'],
    ['binSize' => 40, 'name' => 'O'],
    ['binSize' => 22, 'name' => 'P'],
    ['binSize' => 18, 'name' => 'Q'],
    ['binSize' => 29, 'name' => 'R'],
    ['binSize' => 33, 'name' => 'S'],
    ['binSize' => 17, 'name' => 'T'],
];

$itemsToFit = [
    ['size' => 8.5],
    ['size' => 3],
    ['size' => 1.5],
    ['size' => 6],
    ['size' => 15],
    ['size' => 9],
    ['size' => 4],
    ['size' => 100],
    ['size' => 9.57],
    ['size' => 5],
    ['size' => 7],
    ['size' => 14],
    ['size' => 11],
    ['size' => 2],
    ['size' => 1],
    ['size' => 13],
    ['size' => 17],
    ['size' => 19],
    ['size' => 20],
    ['size' => 21],
    ['size' => 16],
    ['size' => 18],
    ['size' => 22],
    ['size' => 23],
    ['size' => 24],
    ['size' => 25],
    ['size' => 8.75],
    ['size' => 3.5],
    ['size' => 2.25],
    ['size' => 6.5],
    ['size' => 15.25],
    ['size' => 9.5],
    ['size' => 0.5],
    ['size' => 4.75],
    ['size' => 10.5],
    ['size' => 11.5],
    ['size' => 5.5],
    ['size' => 7.5],
    ['size' => 14.5],
    ['size' => 1.75],
    ['size' => 13.5],
    ['size' => 17.5],
    ['size' => 19.5],
    ['size' => 20.5],
    ['size' => 21.5],
    ['size' => 16.5],
    ['size' => 18.5],
    ['size' => 22.5],
    ['size' => 23.5],
    ['size' => 24.5],
    ['size' => 25.5],
];



binPackAlgo($binData , $itemsToFit);
?>