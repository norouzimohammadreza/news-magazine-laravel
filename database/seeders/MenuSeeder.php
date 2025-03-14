<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static int $COUNT = 5;

    public function run(): void
    {
        for ($i = 0; self::$COUNT - 1 >= $i; $i++) {
            $this->menu(null);
        }
        $this->menu(function (): int {
            return Menu::factory()->create()->id;
        });
    }

    public function menu($sub)
    {
        $subMenu = Menu::factory()->create([
            'parent_id' => $sub,
        ]);
        return $subMenu;
    }
}
