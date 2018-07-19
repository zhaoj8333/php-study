<?php

require '../BaseQuery.php';
require '../../../vendor/fzaninotto/faker/src/autoload.php';
require '../BatchInsert.php';

class DriverDay extends BaseQuery
{
    use BatchInsert;

    const INSERT_MAX_LIMIT = 2;
    const PK_AUTO_INCREMENT = true;

    public $tableName = 'driver_day';
    public $faker;
    private $driverDay = [];
    private $offset = 0;

    public $fields = [
        'id',
        'runtime_rank',
        'runtime_yesterday_rank',
        'runtime_nation_rank',
        'mile_rank',
        'mile_yesterday_rank',
        'mile_nation_rank',
        'oil_rank',
        'oli_yesterday_rank',
        'oil_nation_rank',
        'security_rank',
        'security_yesterday_rank',
        'security_nation_rank',
        'drivername',
        'orgroot',
        'ymd',
        'runtime',
        'mile',
        'oil_total',
        'oil_mile',
        'oil_mile_100',
        'security_score',
        'driverid',
        'truckid'
    ];

    public function initialize()
    {
        $this->faker = Faker\Factory::create();
        $this->faker->addProvider(new Faker\Provider\zh_CN\Person($this->faker));
    }

    public function buildDriverDay()
    {
        while (true) {
            if (self::PK_AUTO_INCREMENT) {
                $id = null;
            } else {
                $id = $this->faker->unique()->uuid;
            }
            $runtime_rank  = $this->faker->unique()->numberBetween(1, 100000);
            $mile_rank     = $this->faker->unique()->numberBetween(1, 100000);
            $oil_rank      = $this->faker->unique()->numberBetween(1, 100000);
            $security_rank = $this->faker->unique()->numberBetween(1, 100000);
            $runtime_yesterday_rank  = $this->faker->unique()->numberBetween(1, 100000);
            $mile_yesterday_rank     = $this->faker->unique()->numberBetween(1, 100000);
            $oli_yesterday_rank      = $this->faker->unique()->numberBetween(1, 100000);
            $security_yesterday_rank = $this->faker->unique()->numberBetween(1, 100000);
            $runtime_nation_rank  = $this->faker->unique()->randomNumber();
            $mile_nation_rank     = $this->faker->unique()->randomNumber();
            $oil_nation_rank      = $this->faker->unique()->randomNumber();
            $security_nation_rank = $this->faker->unique()->randomNumber();

            $drivername = $this->faker->name();
            $ymd        = date('Ymd', $this->faker->unique()->unixTime());
            $orgroot    = substr(date('His') . strtoupper($this->faker->lexify()), 0, 6);
            $runtime    = $this->faker->unique()->numberBetween(10000, 100000000);
            $mile       = $this->faker->unique()->randomFloat(2, 5, 10000);
            $oil_total  = $this->faker->unique()->randomFloat(2, 50, 10000);
            $oil_mile   = $this->faker->unique()->randomFloat(2, 50, 100);
            $oil_mile_100   = $this->faker->unique()->randomFloat(2, 5000, 1000000);
            $security_score = $this->faker->unique()->randomNumber();
            $driverid       = md5($drivername . $ymd . $orgroot);
            $truckid        = md5($driverid . $oil_mile_100);

            $this->driverDay[$this->offset] = [
                'id'            => $id,
                'runtime_rank'  => $runtime_rank,
                'mile_rank'     => $mile_rank,
                'oil_rank'      => $oil_rank,
                'security_rank' => $security_rank,
                'runtime_yesterday_rank'  => $runtime_yesterday_rank,
                'mile_yesterday_rank'     => $mile_yesterday_rank,
                'oli_yesterday_rank'      => $oli_yesterday_rank,
                'security_yesterday_rank' => $security_yesterday_rank,
                'runtime_nation_rank'     => $runtime_nation_rank,
                'mile_nation_rank'        => $mile_nation_rank,
                'oil_nation_rank'         => $oil_nation_rank,
                'security_nation_rank'    => $security_nation_rank,
                'drivername'     => $drivername,
                'orgroot'        => $orgroot,
                'ymd'            => $ymd,
                'runtime'        => $runtime,
                'mile'           => $mile,
                'oil_total'      => $oil_total,
                'oil_mile'       => $oil_mile,
                'oil_mile_100'   => $oil_mile_100,
                'security_score' => $security_score,
                'driverid'       => $driverid,
                'truckid'        => $truckid,
            ];

            $this->offset += 1;

            if ($this->offset >= self::INSERT_MAX_LIMIT) {
                $this->batchInsert($this->driverDay, $this->tableName);
                break;
            }
        }
    }

    public function afterSave()
    {
        $this->driverDay = [];
        $this->offset    = 0;
    }
}


$driverDay = new DriverDay('db1');
$driverDay->buildDriverDay();
