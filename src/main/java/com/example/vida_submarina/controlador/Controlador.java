package com.example.vida_submarina.controlador;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class Controlador {

    @GetMapping("/")
    public String inicio() {
        return "inicio"; // Retorna la vista inicio.html
    }

    @GetMapping("/")
    public String propuestas(){
        return "propuestas";
    }
    
}
