package com.repo;

import com.model.Login;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.mongodb.repository.Query;
import org.springframework.data.repository.query.Param;

import java.util.List;


public interface LoginRepo extends MongoRepository<Login, String> {


    public List<Login> findByUserName(@Param("userName") String userName);

    @Query(fields="{ 'userName' : 1}") //Dont return Password
    public List<Login> findByUserNameAndPassword(@Param("userName") String userName, @Param("password") String password);
}
