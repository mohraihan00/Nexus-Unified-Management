<?php

use App\Models\Employee;

describe('Employee Email Validation', function (): void {
    it('accepts a valid email format', function (): void {
        $validEmails = [
            'john.doe@nexus.com',
            'jane@company.co.id',
            'admin+tag@example.org',
            'user123@sub.domain.com',
        ];

        foreach ($validEmails as $email) {
            expect($email)->toBeValidEmail();
        }
    });

    it('rejects an invalid email format', function (): void {
        $invalidEmails = [
            'not-an-email',
            'missing@.com',
            '@no-local-part.com',
            'spaces in@email.com',
            'double@@at.com',
        ];

        foreach ($invalidEmails as $email) {
            expect($email)->not->toBeValidEmail();
        }
    });

    it('validates employee factory generates valid emails', function (): void {
        $employee = Employee::factory()->make();

        expect($employee->email)->toBeValidEmail();
    });
});
