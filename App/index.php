<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php
    /**
     * Class item
     * 
     * @package App
     */
    final class item {
      /** @var int $id */
      private int $id;
      /** @var string $id */
      private string $name;
      /** @var int $id */
      private int $status;
      /** @var bool $id */
      private bool $changed;

      /** В конструкторе содержится ID объекта */
      function __construct($obj_id) {
        $this->obj_id = $obj_id;
      }

      /** Приватный метод который получает и задает свайсва объекта */
      private function init() {
        /**Подключение к бд и произвожу проверку */
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 

        /** Подклечение к таблице 'objects' */
        $query ="SELECT * FROM objects";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        /** Вывожу из таблицы 2 и 3 столбцы таблицы */
        if($result) {
          echo "<ul>";
            while ($row = mysqli_fetch_row($result)) {
                echo "<li>$row[1]</li>";
                echo "<li>$row[2]</li>";
            }
          echo "</ul>";

          mysqli_free_result($result);
        }

        /** 
         * @param $key
         * @return $key */
        function __get($key) {
          return $this->$key;
        }

        /** 
         * @param $key
         * @param $value
         */
        function __set($key, $value) {
          if (empty($value) && gettype($value)) {
            $this->name[$key] = $value;
            $this->status[$key] = $value;
          }
        }
      }

      /** Публичный метод который сохраняет устанвленые значения, если свойсва были изменены извне */
      function save() {
        /** Описать не смог */
      }
    }
    

    $obj = new item($obj_id);
    $obj_id = spl_object_id( $obj );
  ?>

</body>
</html>