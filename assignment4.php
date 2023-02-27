
//1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.

<?php
function sortByStrLength( array $string ): array
{
    usort( $string, function ( $x, $y) {
        return strlen( $x ) - strlen( $y );
    } );
    return $string;
}

$name = array( 'setu', 'niloy', 'shaikot', 'tauhidul', 'milon', 'riti' );

print_r( sortByStrLength( $name ) );

echo "\n\n";

//2: Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.


function concatTwoString( string $firstStr, string $secondStr ): string {
    return $firstStr .= $secondStr;
}
echo concatTwoString( "Subhendu", "Bachhar" );

echo "\n\n";

?>

// 03: Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.

<?php

function removeFirstAndLastElement( array $array ): array
{
    return array_slice( $array, 1, -1 );
}
$friends = array( 'nazmul', 'sujon', 'setu', 'FaisalBhai', 'Debu', 'subrota', "tauhidul" );
print_r( removeFirstAndLastElement( $friends ) );

echo "\n\n";



//4. Write a PHP function to check if a string contains only letters and whitespace.

<?php

function checkString( string $string ): string 
{
    if ( preg_match( '/^[A-Za-z\s]+$/', $string ) ) {
        return "This string contains letters & whitespace only";
    } else {
        return "The string contains other characters as well";
    }
}

$str = "Subhendu Bachhar Setu *34";
echo checkString( $str );

echo "\n\n";

?>

//5. Write a PHP function to find the second largest number in an array of numbers.

<?php
function largestSecondNumber( array $number ): int {
    rsort( $number );
    return $number[1];
}
$number = array( 5, 3, 27, 7, 64, 989 );
echo "The largest second number is " . largestSecondNumber( $number );

?>
