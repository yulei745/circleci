<?php

declare(strict_types=1);

/*
 * Discuz & Tencent Cloud
 * This is NOT a freeware, use is subject to license terms
 *
 * $Id: CreateThreadController.php xxx 2019-10-10 11:08:00 LiuDongdong $
 */

namespace App\Commands\Group;

use App\Models\Group;
use App\Models\User;
use App\Validators\GroupValidator;
use Discuz\Auth\AssertPermissionTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class CreateGroup
{
    use AssertPermissionTrait;

    protected $user;
    protected $data;
    protected $groupValidator;

    public function __construct(User $user, Collection $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    public function handle(GroupValidator $groupValidator)
    {
        $this->assertCan($this->user, 'group.createGroup');

        $group = new Group();

        $data = Arr::get($this->data, 'data.attributes', []);

        $group->name = Arr::get($data, 'name');
        $group->type = Arr::get($data, 'type');
        $group->color = Arr::get($data, 'color');
        $group->icon = Arr::get($data, 'icon');

        $groupValidator->valid($group->getAttributes());
        $group->save();

        return $group;
    }
}
