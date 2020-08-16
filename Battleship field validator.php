<?php

function validate_battlefield(array $aField): bool {
   // Проверка количества строк :
    if( count($aField) != 10 )
        return false;

    // Счетчик кораблей на поле :
    $iShipCounter = 0;
    $iSingleDeckCounter = 0;
    $iDoubleDeckCounter = 0;
    $iThreeDeckCounter = 0;
    $iFourDeckCounter = 0;

    // Перебор по строкам :
    for( $iY = 0; $iY < 10; $iY++ ) {
        // Проверка количества столбцов :
        if( count( $aField[$iY] ) != 10 )
            return false;

        # Подсчет количества кораблей по палубно :

        $sTmp = implode($aField[$iY]);
        $iDoubleDeckCounter += substr_count( $sTmp, '0110' );
        $iThreeDeckCounter += substr_count( $sTmp, '01110' );
        $iFourDeckCounter += substr_count( $sTmp, '1111' );

        //Перебор по столбцам :
        for( $iX = 0; $iX < 10; $iX++ ) {

            //Если это корабль :
            if( $aField[$iY][$iX] == 1 ) {

                //Проверяем что бы угловые ячейки содержали 0 :
                if( $aField[$iY-1][$iX-1] != 0 || $aField[$iY-1][$iX+1] != 0 || $aField[$iY+1][$iX-1] != 0 || $aField[$iY+1][$iX+1] != 0 )
                    return false;

                //Проверяем, однопалубный ли это корабль :
                if( $aField[$iY-1][$iX] == 0 && $aField[$iY+1][$iX] == 0 && $aField[$iY][$iX-1] == 0 && $aField[$iY][$iX+1] == 0)
                    $iSingleDeckCounter++;

                //Увеличиваем счетчик палуб кораблей :
                $iShipCounter++;
            }
        }
    }
    //Проверка количества палуб на поле :
    if( $iShipCounter != 20 )
        return false;
    if( $iSingleDeckCounter != 4 )
        return false;

    //Подсчет количества кораблей по вертикали :
    for( $iX = 0; $iX < 10; $iX++ ) {
        $aTmp = [];
        for( $iY = 0; $iY < 10; $iY++ )
            $aTmp[] = $aField[$iY][$iX];
        $sTmp = implode($aTmp);
        $iDoubleDeckCounter += substr_count( $sTmp, '0110' );
        $iThreeDeckCounter += substr_count( $sTmp, '01110' );
        $iFourDeckCounter += substr_count( $sTmp, '1111' );
    }
    //Проверка количества кораблей на поле :
    if( $iDoubleDeckCounter != 3 || $iThreeDeckCounter != 2 || $iFourDeckCounter != 1 )
        return false;

    return true;
}
validate_battlefield([
    [1, 0, 0, 0, 0, 1, 1, 0, 0, 0],
    [1, 0, 1, 0, 0, 0, 0, 0, 1, 0],
    [1, 0, 1, 0, 1, 1, 1, 0, 1, 0],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
    [0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
    [0, 0, 0, 1, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
]);


