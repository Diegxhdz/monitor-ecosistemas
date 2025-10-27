package com.example.vida_submarina.especie;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "especies")
public class Especie {
    @Id
    private int id;
    private String nombre;
    private String nombreCientifico;
    @Column(name = "grupo_biologico")
    private String grupoBiologico;
    private String estatus;

    public Especie() {
        // JPA requires a no-arg constructor
    }

    public Especie(int id, String nombre, String nombreCientifico, String habitat, String grupoBiologico, String estatus) {
        this.id = id;
        this.nombre = nombre;
        this.nombreCientifico = nombreCientifico;
        this.grupoBiologico = grupoBiologico;
        this.estatus = estatus;
    }

    public String getNombreCientifico() {
        return nombreCientifico;
    }
    

    public String getGrupoBiologico() {
        return grupoBiologico;
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

    public void setGrupoBiologico(String grupoBiologico) {
        this.grupoBiologico = grupoBiologico;
    }

    public String getEstatus() {
        return estatus;
    }

    public void setEstatus(String estatus) {
        this.estatus = estatus;
    }

}
