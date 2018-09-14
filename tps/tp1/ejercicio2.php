<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <pre>
    <?php

      $array = array(1,2,3,4,5,6);
      $arrayaso = array('casa'=>"paso de los andes",'numero'=>"1234",'nombre'=>"martin",'apellido'=>"gonzales");


    $array2 = array(array(array("rose", 1.25, 15),
                        array("daisy", 0.75, 25),
                        array("orchid", 1.15, 7)
                       ),
                  array(array("rose", 1.25, 15),
                        array("daisy", 0.75, 25),
                        array("orchid", 1.15, 7)
                       ),
                  array(array("rose", 1.25, 15),
                        array("daisy", 0.75, 25),
                        array("orchid", 1.15, 7)
                       )
                 );

      $array3 =array( 'array1'=>array('casa'=>"paso de los andes",'numero'=>1234,'nombre'=>"martin",'apellido'=>"gonzales"),
                    'array2'=>array('casas'=>"castro barros",'numeros'=>5678,'nombres'=>"Fernando",'apellidos'=>"perez"),
                    'array3'=>array('casaa'=>"san martin",'numeroa'=>9101,'nombrea'=>"juan",'apellidoa'=>"Ortega")
                    );

echo "array N1<br><br>";
      print_r ($array);
      echo "array N2<br><br>";
      print_r ($arrayaso);
      echo "array N3<br><br>";
      print_r ($array2);
      echo "array N4<br><br>";
      print_r ($array3);

     ?>
       </pre>
  </body>
</html>
