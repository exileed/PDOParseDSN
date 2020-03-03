<?php

namespace ExileeD\PDOParseDSN;

class DSN
{

    /**
     * @var string
     */
    private $dsn;

    /**
     * Mysql, pgsql
     *
     * @var string
     */
    private $protocol;

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * Constructor.
     *
     * @param string $dsn
     *
     * @throws \LogicException
     */
    public function __construct($dsn)
    {
        $this->dsn = $dsn;
        $this->parseDsn($dsn);
    }

    /**
     * @param string $dsn
     *
     * @throws \LogicException
     */
    private function parseDsn($dsn)
    {
        $dsn = trim($dsn);

        if (strpos($dsn, ':') === false) {
            throw new \LogicException(sprintf('The DSN is invalid. It does not have scheme separator ":".'));
        }

        list($prefix, $dsnWithoutPrefix) = preg_split('#\s*:\s*#', $dsn, 2);

        $this->protocol = $prefix;

        if (preg_match('/^[a-z\d]+$/', strtolower($prefix)) == false) {
            throw new \LogicException('The DSN is invalid. Prefix contains illegal symbols.');
        }

        $dsnElements = preg_split('#\s*\;\s*#', $dsnWithoutPrefix);

        $elements = [];
        foreach ($dsnElements as $element) {
            if (strpos($dsnWithoutPrefix, '=') !== false) {
                list($key, $value) = preg_split('#\s*=\s*#', $element, 2);
                $elements[$key] = $value;
            } else {
                $elements = [
                    $dsnWithoutPrefix,
                ];
            }
        }
        $this->parameters = $elements;
    }

    /**
     * @return string
     */
    public function getDsn()
    {
        return $this->dsn;
    }

    /**
     * @return string|null
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @return string|null
     */
    public function getDatabase()
    {
        return $this->getAttribute('dbname');
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->getAttribute('host');
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->getAttribute('port');
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->getAttribute('charset');
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param string $key
     *
     * @return mixed
     */
    private function getAttribute($key)
    {
        if (isset($this->parameters[$key])) {
            return $this->parameters[$key];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
