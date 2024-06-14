# Bin Packing Algorithm

This repository contains a PHP implementation of the bin packing algorithm using the Best Fit approach. The algorithm is designed to fit items of various sizes into bins with fixed capacities as efficiently as possible.

## Description

The bin packing algorithm takes an array of bins with specified sizes and an array of items with sizes to fit into these bins. The algorithm sorts the items in descending order and places each item into the most suitable bin based on the remaining space.

## Usage

### Prerequisites

- PHP 7.4 or higher

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/bin-packing-algo.git
    ```

2. Navigate to the project directory:

    ```bash
    cd bin-packing-algo
    ```

### Running the Algorithm

1. Create your bin and item data arrays in the script.

2. Call the `binPackAlgo` function with the data arrays.

### Test Case For Best-Fit
```
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

```
