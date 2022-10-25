<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        $sec = $ano/100 ; 
        $sec = ceil($sec); 

        return $sec;
        
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {

        $divisor = 0;
        //  Nao importa se o numero digitado é primo, eu quero pegar o antecessor então subtraiu por 1 pra evitar que identifique que seja mandado um numero primo
         $numero = $numero - 1;
    
        //  Como 2 é o menor numero primo
        if($numero >= 2){
            for($count=2; $count<$numero; $count++){
                if($numero % $count == 0){                    
                    $divisor++;
                    
                    $numero = $numero - 1;

                    // Laço inverso pegando o numero digitado e diminuindo ate encontrar o primero primo antecessor
                    for($count2=2; $count2 < $numero; $count2++){
                        if($numero % $count2 == 0){                           
                            $numero--;
                            $count2 = 1;
                        }
                    }                                         
                    $count = $numero;
                    return $numero;                                      
                }
            }
            
            // Se for um numero acima do primo ele nao precisa entrar no for a cima
            if(!$divisor){
                return $numero;
            }  
            
        }else{
            return 0;
        }  
        
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $cont = 0;
        // Recebo os array e percorro
        foreach ($arr as $valor) {
            foreach ($valor as $val) {          
                // junto todos os elementos em apenas um array 
                $list[] = $val;
                $cont++;
            }
            
        }
        // Ordeno ela em modo decrescente
        rsort($list);   
        
        $segundo_maior = 0;

        // Verifico se os maiores numeros se repetem e pego o primeiro menor que ele.
        for($i=0; $i<$cont; $i++){
            if(($i + 1) != $cont){
                if($list[$i] != $list[$i+1]){                
                    $segundo_maior = $list[$i + 1];
                    $i = $cont;
                }
            }
        }
        // Caso todos os numeros sejam iguais
        if($segundo_maior == 0){
            $segundo_maior = $list[0];
        }
        

        return $segundo_maior;
        
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr) {
        $count = count($arr);
    
        $true  = 0;
        $false = 0;
        $extra = 0;

        for($i=0; $i<$count; $i++){
            if(($i + 1) < $count){
                if($arr[$i] < $arr[$i+1]){
                    $true++;
                }else{
                    $false++;
                }

                if($i >= 1 ){
                    if($arr[$i+1] <= $arr[$i-1]){
                        $extra++;
                    }                    
                }
            }            
        }

        if($false > 1){
            return false;
        }else
            if($false >= 1 && $extra > 1){
                return false;
            }
        else{
            return true;
        }
    }
}
