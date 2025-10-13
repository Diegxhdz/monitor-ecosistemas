package com.example.vida_submarina.especie;
import org.springframework.data.jpa.repository.JpaRepository;

public interface EspecieRepo extends JpaRepository<Especie, Integer> {
    Especie findByNombre(String nombre);
    Especie findByNombreCientifico(String nombreCientifico);
    Especie findByHabitat(String habitat);
    Especie findByGrupoBiologico(String grupoBiologico);
}
