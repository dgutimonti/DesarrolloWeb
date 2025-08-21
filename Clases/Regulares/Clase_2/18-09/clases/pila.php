<?php

/**
 * Implementa una estructura de datos de Pila (Stack) LIFO (Last-In, First-Out).
 */
class Pila {
    /**
     * @var array Almacena los elementos de la pila.
     */
    private array $elementos = [];
    /**
     * @var int Apunta a la siguiente posición libre en la parte superior de la pila.
     */
    private int $tope;
 
    /**
     * Constructor de la clase Pila.
     */
    public function __construct() {
        $this->tope = 0;
    }
 
    /**
     * Inserta un elemento en la cima de la pila (Push).
     * @param mixed $elemento El elemento a insertar.
     */
    public function insertar(mixed $elemento): void {
        $this->elementos[$this->tope] = $elemento;
        $this->tope++;
    }
 
    /**
     * Elimina y devuelve el elemento de la cima de la pila (Pop).
     * @return mixed|null El elemento de la cima, o null si la pila está vacía.
     */
    public function eliminar(): mixed {
        if ($this->estaVacia()) {
            return null; // Es mejor devolver null que imprimir un mensaje.
        }
        // El índice correcto es $this->tope - 1.
        $valor = $this->elementos[$this->tope - 1];
        unset($this->elementos[$this->tope - 1]); // Opcional: liberar memoria.
        $this->tope--;
        return $valor;
    }
 
    /**
     * Devuelve todos los elementos de la pila como un array.
     * @return array Los elementos de la pila.
     */
    public function mostrar(): array {
        return $this->elementos;
    }
 
    /**
     * Comprueba si la pila está vacía.
     * @return bool True si la pila está vacía, false en caso contrario.
     */
    public function estaVacia(): bool {
        return $this->tope === 0;
    }
}
?>

