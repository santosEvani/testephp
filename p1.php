<?php

class Tag{
    private $innerHTML;
    
    public function Tag($innerHTML){
        $this->innerHTML = $innerHTML;
    }
    
    public function getInnerHTML(){
        return $this->innerHTML;
    }
}

class P extends Tag{
    
}

class Span extends Tag{
    
}

class Div extends Tag{
    
}

class Form extends Tag{
    private $type;
    
    public function Form($innerHTML, $type){
        parent::Tag($innerHTML);
        $this->type = $type;
    }
    
    public function getType(){
        return $this->type;
    }
}

///////////////////////////////////

class Pagina{
    //Relacao Has-Many, um pagina para varias tags
    private $tags;
    
    public function Pagina(){
        $this->tags = array();
    }
    //O type hint em $tag indica que podemos usar o
    //Polimorfismo de subtipos
    public function inserirTag(Tag $tag){
        $this->tag[] = $tag;
    }
    
    public function listarConteudo(){
        foreach ($tags as $t) {
            //Acontece por causa da Herança
            echo $t->getInnerHTML();
            //instanceof, usado por causa da herança,
            //compara se $t eh instancia de Form para usar o
            //getType.
            if($t instanceof Form){
                echo $t->getType();
            }
        }
    }
}

///////////////////////////////////////////////////

class Disciplina{
    private $nomeAluno, $disciplina, $notaP1, $notaP2;
    
    public function Disciplina($nomeAluno, $disciplina, $notaP1, $notaP2){
        $this->nomeAluno = $nomeAluno;
        $this->disciplina = $disciplina;
        $this->notaP1 = $notaP1;
        $this->notaP2 = $notaP2;
    }
    
    public function isAprovado(){
        return 0.5*($this->notaP1 + $this->notaP2) >= 6
    }
    
    /**
     * DESCR: O METODO FAZ ...
     * AUTOR: 1 por metodo
     * HORAS: ...
     * ENTRADA: EXPLICAR PARAMETROS
     * SAIDA: EXPLICAR O RETORNO, SE HOUVER
     ***/
    public function toJSON(){
        if($this->isAprovado())
            echo json_encode($this);
    }
}



?>