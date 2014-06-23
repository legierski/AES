<?php

use Legierski\AES\AES;

class AESTest extends PHPUnit_Framework_TestCase
{
    public function testEncryptionOutputLooksLegit()
    {
        $aes = new AES;

        $result = $aes->encrypt('Very sensitive data', 'password');

        $this->assertNotFalse($result);
        $this->assertNotNull($result);
        $this->assertGreaterThan(0, strlen($result));
    }

    public function testEncryptedDataCanBeDecrypted()
    {
        $aes = new AES;

        $data = 'Very sensitive data';
        $password = 'password';

        $encrypted = $aes->encrypt($data, $password);
        $decrypted = $aes->decrypt($encrypted, $password);

        $result = $decrypted;
        $expected = $data;

        $this->assertEquals($expected, $result);
    }

    public function testSampleDataCanBeDecrypted()
    {
        $aes = new AES;

        $encrypted = 'U2FsdGVkX1+nnmEfHgoGQpwSPcT+mDZHxhr8XhEsmIvT2JAxsIzsRocO6x1PErrF';
        $password = 'password';

        $result = $aes->decrypt($encrypted, $password);
        $expected = 'Very sensitive data';

        $this->assertEquals($expected, $result);
    }

    public function testEncryptionIsRandom()
    {
        $aes = new AES;

        $data = 'Very sensitive data';
        $password = 'password';

        $encrypted1 = $aes->encrypt($data, $password);
        $encrypted2 = $aes->encrypt($data, $password);

        $this->assertNotEquals($encrypted1, $encrypted2);
    }
}
