# Blade Directive: @with

[![Software License][ico-license]](LICENSE.md)

A simple blade directive to help clean up your views.

Instead of doing this elaborate jig:

``` blade
    <tr>
        <td>{{ $model->relation->method()->object->first_name }}</td>
        <td>{{ $model->relation->method()->object->first_name }}</td>
        <td>{{ $model->relation->method()->object->email }}</td>
    </tr>
```

You can clean it up like this:

``` blade
    @with($model->relation->method()->object as $object)

    <tr>
        <td>{{ $object->first_name }}</td>
        <td>{{ $object->first_name }}</td>
        <td>{{ $object->email }}</td>
    </tr>
```

All this does is assign an expression to a variable.


## Install

Via Composer

``` bash
$ composer require czim/with-blade-directive
```

## Usage

The `@with` directive supports two formats:

``` blade
    @with(any_expression($you * $want) as $variableName)

    @with('variableName', any_expression($you * $want))
```

These have exactly the same result.


## Credits

- [Coen Zimmerman][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/czim/with-blade-directive.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/czim/with-blade-directive.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/czim/with-blade-directive
[link-downloads]: https://packagist.org/packages/czim/with-blade-directive
[link-author]: https://github.com/czim
[link-contributors]: ../../contributors
