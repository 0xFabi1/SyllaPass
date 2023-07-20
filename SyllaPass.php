<?php
/*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
   SSSSSSSSSSSSSSS                   lllllll lllllll                   PPPPPPPPPPPPPPPPP                                                         
 SS:::::::::::::::S                  l:::::l l:::::l                   P::::::::::::::::P                                                        
S:::::SSSSSS::::::S                  l:::::l l:::::l                   P::::::PPPPPP:::::P                                                       
S:::::S     SSSSSSS                  l:::::l l:::::l                   PP:::::P     P:::::P                                                      
S:::::S      yyyyyyy           yyyyyyyl::::l  l::::l   aaaaaaaaaaaaa     P::::P     P:::::Paaaaaaaaaaaaa      ssssssssss       ssssssssss        
S:::::S       y:::::y         y:::::y l::::l  l::::l   a::::::::::::a    P::::P     P:::::Pa::::::::::::a   ss::::::::::s    ss::::::::::s       
 S::::SSSS     y:::::y       y:::::y  l::::l  l::::l   aaaaaaaaa:::::a   P::::PPPPPP:::::P aaaaaaaaa:::::ass:::::::::::::s ss:::::::::::::s      
  SS::::::SSSSS y:::::y     y:::::y   l::::l  l::::l            a::::a   P:::::::::::::PP           a::::as::::::ssss:::::ss::::::ssss:::::s     
    SSS::::::::SSy:::::y   y:::::y    l::::l  l::::l     aaaaaaa:::::a   P::::PPPPPPPPP      aaaaaaa:::::a s:::::s  ssssss  s:::::s  ssssss      
       SSSSSS::::Sy:::::y y:::::y     l::::l  l::::l   aa::::::::::::a   P::::P            aa::::::::::::a   s::::::s         s::::::s           
            S:::::Sy:::::y:::::y      l::::l  l::::l  a::::aaaa::::::a   P::::P           a::::aaaa::::::a      s::::::s         s::::::s        
            S:::::S y:::::::::y       l::::l  l::::l a::::a    a:::::a   P::::P          a::::a    a:::::assssss   s:::::s ssssss   s:::::s      
SSSSSSS     S:::::S  y:::::::y       l::::::ll::::::la::::a    a:::::a PP::::::PP        a::::a    a:::::as:::::ssss::::::ss:::::ssss::::::s     
S::::::SSSSSS:::::S   y:::::y        l::::::ll::::::la:::::aaaa::::::a P::::::::P        a:::::aaaa::::::as::::::::::::::s s::::::::::::::s      
S:::::::::::::::SS   y:::::y         l::::::ll::::::l a::::::::::aa:::aP::::::::P         a::::::::::aa:::as:::::::::::ss   s:::::::::::ss       
 SSSSSSSSSSSSSSS    y:::::y          llllllllllllllll  aaaaaaaaaa  aaaaPPPPPPPPPP          aaaaaaaaaa  aaaa sssssssssss      sssssssssss         
                   y:::::y                                                                                                                       
                  y:::::y                                                                                                                        
                 y:::::y                                                                                                                         
                y:::::y                                                                                                                          
               yyyyyyy                                                                                                                           
                                                                                                                                                 
                                                                                                                        
By: 0xFabi1                                                                    
*/


// Nom:SyllaGen
// Output: syllabe random
function SyllaGen()
{
    $consonants = array('b', 'c', 'ch', 'd', 'f', 'g', 'j', 'k', 'l', 'm', 'n', 'p', 'qu', 'r', 's', 't', 'v', 'w', 'x', 'z', 'br', 'fl', 'fr');
    $vowels = array('a', 'e', 'i', 'o', 'u', 'y', 'ou', 'oi');

    $syllable = $consonants[array_rand($consonants)];
    $syllable .= $vowels[array_rand($vowels)];
    $syllable .= $consonants[array_rand($consonants)];

    return $syllable;
}

/*
Nom : SyllaPass($lenght,specialChar)
Input : 
    $legth = un nombre entier avec 10 comme valuer minimum (12 -14 étant l'idéal niveau facilité et compliance)
    $specialchar = booléen pour indiquer si besoin de charactéres spéciaux (true or false)
Output : 
    retrun $password

*/
function SyllaPass($length, $specialChar)
{
    $password = '';

    // syllabe w frist majuscule
    $password .= ucfirst(SyllaGen());

    // chiffres
    $password .= mt_rand(1000, 9999);

    // caractères spéciaux 
    if ($specialChar) {
        $specialChars = array('!', '@', '$', '%', '&', '*', '(', ')', '_', '-', '+', '=', ':', ';');

        
        $password .= $specialChars[array_rand($specialChars)];
        $password .= $specialChars[array_rand($specialChars)];
    }

    // Length checker 
    while (strlen($password) < $length) {
        $password .= ucfirst(SyllaGen());
    }


    return $password;
}

// Exemple
$length = 12; // Longueur souhaitée 
$specialChar = true; // Activer les caractères spéciaux

$password = SyllaPass($length, $specialChar);
echo $password;
?>
