package com.example.vida_submarina.especie;

import jakarta.persistence.Id;


public class Especie {
    @Id
    private int id;
    private String nombre;
    private String nombreCientifico;
    private String habitat;
    private String grupo_biologico;

    public Especie(int id, String nombre, String nombreCientifico, String habitat, String grupo_biologico) {
        this.id = id;
        this.nombre = nombre;
        this.nombreCientifico = nombreCientifico;
        this.habitat = habitat;
        this.grupo_biologico = grupo_biologico;
    }
    public String getNombreCientifico() {
        return nombreCientifico;
    }

    public String getHabitat() {
        return habitat;
    }

    public String getGrupoBiologico() {
        return grupo_biologico;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setNombreCientifico(String nombreCientifico) {
        this.nombreCientifico = nombreCientifico;
    }

    public void setHabitat(String habitat) {
        this.habitat = habitat;
    }

    public void setGrupoBiologico(String grupo_biologico) {
        this.grupo_biologico = grupo_biologico;
    }

}
