<?php

require '../DataGenerator.php';

class ActorGenerator extends DataGenerator
{

    protected $tableName = 'actor';
    protected $pk = 'actor_id';

    protected $fields = [
        'actor_id',
        'first_name',
        'last_name',
        'last_update',
    ];

    public function generateActors()
    {
        while ($this->total <= self::TOTAL_GENEREATE) {
            if (self::PK_AUTO_INCREMENT) {
                $pk = null;
            } else {
                $pk = $this->faker->unique()->uuid;
            }
            $first_name  = $this->faker->firstname();
            $last_name   = $this->faker->lastname();
            $last_update = $this->faker->date(
                $format = 'Y-m-d H:i:s',
                $max = 'now'
            );

            $this->data[$this->offset] = [
                'actor_id'    => $pk,
                'first_name'  => $first_name,
                'last_name'   => $last_name,
                'last_update' => $last_update,
            ];

            $this->offset += 1;

            if ($this->offset >= self::MAX_DATA_EACH_GENERATE) {
                $res = $this->saveData();
                if (!$res['res']) {
                    break;
                }
                $this->total += self::MAX_DATA_EACH_GENERATE;
                if ($res['res'] == false) {
                    var_dump($res);
                    exit();
                }
                $this->afterSave();
            }
        }
        if (!empty($this->data)) {
            $this->saveData();
            $this->afterSave();
        }
    }

    public function afterSave()
    {
        $this->data = [];
        $this->offset = 0;
    }
}


$data = new ActorGenerator('db1');
$data->generateActors();
