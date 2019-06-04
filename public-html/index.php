<?php 
$website="http://www.google.com";
?>
<!DOCTYPE html>
<head>
    <title>hello world!</title>
</head>
<body>
    <h1>Hello world!</h1>
    <a href="<?php echo $website;?>"><?php echo "string deepak $website";?></a>
    <p>
    <?php 
    $contries = ['germany','france','spain'];
    print_r($contries);
    ?>
    </p>
    <p>
    <?php
    $contries[]='india';
    print_r($contries);
    ?>
    </p>
    <p>
    <?php print_r($contries[3]);
       echo count($contries);
    ?>
    </p>
    <p>
    <?php
    $age = array(
        'John'=>35,
        'Paul'=>24,
        'George'=> 27
    );
    print_r($age);
    ?>
    </p>
    <p>
    <?php 
        class carBluePrint{
         //properties
         //constructor
         public function __construct($newColor,$newMake)
         {
             $this->color=$newColor;
             $this->make=$newMake;
         }
         //setter method
         public function setColor($newColor){
             $this->color = $newColor;
         }
         public function getColor(){
             return "<br>new color is: ".$this->color."<br>";
         }
        }
        $firstRealColor = new carBluePrint("green","Volvo");
        echo $firstRealColor->getColor();
        var_dump($firstRealColor);
        $secondRealColor = new carBluePrint("brown","Mercedes");
        echo $secondRealColor->getColor();
        var_dump($secondRealColor);
    ?>
    </p>
    <p>
    <?php
       class sportCarBluePrint extends carBluePrint{
           public function __construct($newColor,$newMake,$newSpoiler){
               parent::__construct($newColor,$newMake);
               $this->spoiler=$newSpoiler;
           }
           public function activateSpoiler(){
               return "<br><strong>SPOILER ACTIVATED</strong><br>";
           }
       }
       $firstSportCar=new sportCarBluePrint("maginta","Porsche","tail");
       $firstSportCar->setColor("pink");
       echo $firstSportCar->activateSpoiler();
       var_dump($firstSportCar);
    ?>
    </p>
</body>
</html>