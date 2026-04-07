<?php

use App\Models\Employee;

describe('Employee Management', function (): void {
    it('can store a new employee via POST /employees', function (): void {
        $employeeData = [
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@nexus.com',
            'position' => 'Software Engineer',
            'status' => 'active',
        ];

        $response = $this->post(route('employees.store'), $employeeData);

        $response->assertRedirect(route('employees.index'));
        $response->assertSessionHas('success', 'Karyawan berhasil ditambahkan.');

        $this->assertDatabaseHas('employees', [
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@nexus.com',
            'position' => 'Software Engineer',
            'status' => 'active',
        ]);
    });

    it('validates required fields when storing an employee', function (): void {
        $response = $this->post(route('employees.store'), []);

        $response->assertSessionHasErrors(['name', 'email', 'position', 'status']);
    });

    it('prevents duplicate email addresses', function (): void {
        Employee::factory()->create(['email' => 'existing@nexus.com']);

        $response = $this->post(route('employees.store'), [
            'name' => 'Another Employee',
            'email' => 'existing@nexus.com',
            'position' => 'Manager',
            'status' => 'active',
        ]);

        $response->assertSessionHasErrors(['email']);
    });

    it('can display the employee index page', function (): void {
        Employee::factory()->count(3)->create();

        $response = $this->get(route('employees.index'));

        $response->assertStatus(200);
        $response->assertViewIs('employees.index');
        $response->assertViewHas('employees');
    });

    it('can update an existing employee', function (): void {
        $employee = Employee::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated@nexus.com',
            'position' => 'Lead Engineer',
            'status' => 'inactive',
        ];

        $response = $this->put(route('employees.update', $employee), $updatedData);

        $response->assertRedirect(route('employees.index'));

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'name' => 'Updated Name',
            'email' => 'updated@nexus.com',
        ]);
    });

    it('can delete an employee', function (): void {
        $employee = Employee::factory()->create();

        $response = $this->delete(route('employees.destroy', $employee));

        $response->assertRedirect(route('employees.index'));
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    });
});
