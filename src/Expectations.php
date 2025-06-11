<?php

declare(strict_types=1);

namespace Soyhuce\PestPluginLaravel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\LazyCollection;
use Illuminate\Testing\Assert;
use Pest\Expectation;
use SebastianBergmann\Exporter\Exporter;
use Soyhuce\Testing\Assertions\LaravelAssert;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/** @var Expectation<mixed> $this */

expect()->extend('toBeModel', function (Model $expected): Expectation {
    LaravelAssert::assertIsModel($expected, $this->value);

    return $this;
});

expect()->extend('toBeCollection', function (array|Collection $expected): Expectation {
    $value = $this->value instanceof LazyCollection ? $this->value->collect() : $this->value;

    LaravelAssert::assertCollectionEquals($expected, $value);

    return $this;
});

expect()->extend('toBeCollectionCanonicalizing', function (array|Collection $expected): Expectation {
    $value = $this->value instanceof LazyCollection ? $this->value->collect() : $this->value;

    LaravelAssert::assertCollectionEqualsCanonicalizing($expected, $value);

    return $this;
});

expect()->extend('toBeData', function (Data $expected): Expectation {
    LaravelAssert::assertDataEquals($expected, $this->value);

    return $this;
});

expect()->extend('toBeDataCollection', function (array|DataCollection $expected): Expectation {
    LaravelAssert::assertDataCollectionEquals($expected, $this->value);

    return $this;
});

expect()->extend('toBeAbleTo', function (string $ability, mixed $arguments = []): Expectation {
    $exporter = new Exporter;

    Assert::assertTrue(
        Gate::forUser($this->value)->check($ability, $arguments),
        sprintf(
            'Failed asserting that the given user is authorized to "%s" with [%s]',
            $ability,
            $exporter->shortenedExport($arguments)
        )
    );

    return $this;
});
