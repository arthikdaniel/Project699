package com.repo;


import com.model.Payment;
import org.bson.types.ObjectId;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.repository.query.Param;

import java.util.List;


public interface IPaymentRepo extends MongoRepository<Payment, String> {

    public List<Payment> findByStudentId(@Param("studentId") String studentId);

}