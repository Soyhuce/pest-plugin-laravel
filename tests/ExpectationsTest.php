<?php

use Illuminate\Support\Collection;

it('matches collections', function () {
    expect(new Collection([1, 2, 3]))->toBeCollection([1, 2, 3]);
});
