package com.example.vida_submarina.ecosistema;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "ecosistemas")
public class Ecosistema {
    @Id
    private int id;
    private String nombre;
    private String descripcion;

    public Ecosistema(String descripcion, int id, String nombre) {
        this.descripcion = descripcion;
        this.id = id;
        this.nombre = nombre;
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

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    

}
