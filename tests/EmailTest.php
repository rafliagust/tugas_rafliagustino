<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../logic.php';

class EmailTest extends TestCase
{
    protected function setUp(): void
    {
        file_put_contents('database.json', '[]');
    }

    // 1. Tes Register Email Kembar
    public function testEmailDuplikat()
    {
        registerUser('Andi', 'andi@mail.com', '123456');
        $hasil = registerUser('Budi', 'andi@mail.com', '654321'); // Email sama
        $this->assertEquals("Email sudah terdaftar!", $hasil);
    }

    // 2. Tes Register Sukses
    public function testRegisterSukses()
    {
        $hasil = registerUser('Citra', 'citra@mail.com', 'rahasia');
        $this->assertTrue($hasil);
    }

    // 3. Tes Login Sukses
    public function testLoginSukses()
    {
        registerUser('Dedi', 'dedi@mail.com', 'polos123');
        $user = loginUser('dedi@mail.com', 'polos123');
        $this->assertIsArray($user);
        $this->assertEquals('Dedi', $user['name']);
    }

    // 4. Tes Login Gagal
    public function testLoginGagal()
    {
        registerUser('Eka', 'eka@mail.com', 'polos123');
        $user = loginUser('eka@mail.com', 'salahpassword');
        $this->assertFalse($user);
    }
}
?>
