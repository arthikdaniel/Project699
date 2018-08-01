package com.repo;

import com.model.Sequence;
import org.springframework.data.mongodb.repository.MongoRepository;

public interface SequenceRepo extends MongoRepository<Sequence, String> {
}
