package com.repo;

import com.model.Message;
import com.model.Payment;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.repository.query.Param;

import java.util.List;


public interface MessageRepo extends MongoRepository<Message, String> {

    public List<Message> findByStudentId(@Param("studentId") String studentId);

}