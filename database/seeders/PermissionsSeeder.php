<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, create all permissions
        $permissions = [
            // Properties
            "view properties",
            "create properties",
            "edit properties",
            "delete properties",
            "publish properties",
            "feature properties",
            "approve properties",

            // Users
            "view users",
            "create users",
            "edit users",
            "delete users",
            "ban users",

            // Owners
            "view owners",
            "create owners",
            "edit owners",
            "delete owners",
            "verify owners",

            // Buyers
            "view buyers",
            "create buyers",
            "edit buyers",
            "delete buyers",

            // Inquiries
            "view inquiries",
            "respond to inquiries",
            "delete inquiries",
            "create inquiries",

            // Financial
            "view invoices",
            "create invoices",
            "edit invoices",
            "delete invoices",
            "send invoices",
            "mark invoices as paid",
            "view payments",
            "process payments",
            "refund payments",

            // Reports
            "view reports",
            "export reports",
            "view analytics",
            "view dashboard",

            // Settings
            "manage settings",
            "manage locations",
            "manage property types",
            "manage amenities",

            // Media
            "upload media",
            "delete media",

            // Reviews
            "view reviews",
            "moderate reviews",
            "delete reviews",

            // Favorites
            "manage favorites",
            "manage saved searches",

            // Contracts
            "view contracts",
            "create contracts",
            "edit contracts",
            "delete contracts",
            "sign contracts",

            // System
            "access admin panel",
        ];

        // Create permissions one by one
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Get roles (they should already exist)
        $adminRole = Role::where('name', 'admin')->first();
        $ownerRole = Role::where('name', 'owner')->first();
        $buyerRole = Role::where('name', 'buyer')->first();

        // Assign all permissions to admin
        if ($adminRole) {
            $adminRole->syncPermissions(Permission::all());
        }

        // Assign specific permissions to owner
        if ($ownerRole) {
            $ownerRole->syncPermissions([
                "view properties",
                "create properties",
                "edit properties",
                "delete properties",
                "view inquiries",
                "respond to inquiries",
                "upload media",
                "delete media",
                "view invoices",
                "view payments",
                "manage favorites",
                "view contracts",
                "sign contracts",
                "view dashboard",
            ]);
        }

        // Assign specific permissions to buyer
        if ($buyerRole) {
            $buyerRole->syncPermissions([
                "view properties",
                "create inquiries",
                "view inquiries",
                "manage favorites",
                "manage saved searches",
                "view contracts",
                "sign contracts",
            ]);
        }
    }
}
