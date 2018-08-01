package com.repo;


import com.model.Course;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

import java.util.List;

public interface ICourseRepo extends MongoRepository<Course, String> {

    public List<Course> findByCourseName(@Param("name") String name);

}