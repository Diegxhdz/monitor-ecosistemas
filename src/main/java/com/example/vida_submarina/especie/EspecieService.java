package com.example.vida_submarina.especie;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class EspecieService {
    @Autowired
    private final EspecieRepo especieRepo;

    public EspecieService(EspecieRepo especieRepo) {
        this.especieRepo = especieRepo;
    }

    public List<Especie> getAllEspecies() {
        return especieRepo.findAll();
    }

    public List<Especie> getEspeciesByNombre(String nombre){
        return especieRepo.findAll().stream().filter(e -> e.getNombre().equalsIgnoreCase(nombre)).toList();
    }

    public List<Especie> getEspeciesByHabitat(String habitat){
        return especieRepo.findAll().stream().filter(e -> e.getHabitat().equalsIgnoreCase(habitat)).toList();
    }

    public List<Especie> getEspeciesByGrupoBiologico(String grupo_biologico){
        return especieRepo.findAll().stream().filter(e -> e.getGrupoBiologico().equalsIgnoreCase(grupo_biologico)).toList();
    }

    public Especie addEspecie (Especie especie) {
        especieRepo.save(especie);
        return especie;
    }
    /*
     
    public Especie updateEspecie(Especie especie){
        Option
    }
     */
}

