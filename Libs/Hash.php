<?php

class Hash
{
    /**
     * Хеширует данные
     * @param string $algorithm Алгоритм хеширования (md5, sha1, whirlpool, etc)
     * @param string $data Данные для хеширования
     * @param string $salt The salt (Должна быть одинакова во всей системе)
     * @return string Захешированные данные
     */
    public static function create($algorithm, $data, $salt)
    {
        $context = hash_init($algorithm, HASH_HMAC, $salt);
        hash_update($context, $data);
        return hash_final($context);
    }
}