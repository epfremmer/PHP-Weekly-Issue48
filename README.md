# Challenge 048: Self-descriptive Number

## Install

`composer install`

## Usage

    Usage:
      php index.php <length>
    
    Arguments:
      length        Number length [default: 10, min: 4, max: 36]
     
## Tests

`bin/phpunit`

## Run All

`time for i in {4..36}; do php index.php $i; echo ""; done;`

_note: 6 cannot be described (throws exception)_
