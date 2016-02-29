# A PHP implementation of the Interval Tree data structure

This is a back-port to PHP5.4.

Based on:

 - https://github.com/tylerkahn/intervaltree-python
 - https://github.com/misshie/interval-tree

Your range objects should implement IntervalTree\RangeInterface. There are
numeric and DateTime-based implementations included.

To install via Composer:

1. `composer.phar require judev/php-intervaltree:dev-master`
2. add to composer.json:
```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/dillchuk/php-intervaltree"
        }
    ],
 ```
