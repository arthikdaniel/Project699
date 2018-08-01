package com.repo;


import java.util.List;

import com.model.Student;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.data.domain.Sort;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.mongodb.repository.Query;
import org.springframework.data.repository.query.Param;

public interface IStudentRepo extends MongoRepository<Student, String> {

    public List<Student> findByStudentId(@Param("studentId") String studentId);

    public List<Student> findByLastName(@Param("name") String name);

    @Query(fields="{firstName : 1, lastName : 1, dateOfBirth : 1}")
    public List<Student> findAllByOrderByStudentIdDesc();

}