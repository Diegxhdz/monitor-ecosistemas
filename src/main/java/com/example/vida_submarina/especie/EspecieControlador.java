package com.example.vida_submarina.especie;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping(path="/especies")
public class EspecieControlador {
    
    private EspecieService especieService;

    @Autowired
    public EspecieControlador(EspecieService especieService){
        this.especieService=especieService;
    }

    @GetMapping
    public List<Especie> getEspecies(
        @RequestParam(required=false) String nombre,
        @RequestParam(required=false) String nombreCientifico,
        @RequestParam(required=false) String grupo_biologico)
        {
            return especieService.getAllEspecies();
        }


    
    
}
