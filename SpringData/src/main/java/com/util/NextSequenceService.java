package com.util;

import static org.springframework.data.mongodb.core.FindAndModifyOptions.options;
import static org.springframework.data.mongodb.core.query.Criteria.where;
import static org.springframework.data.mongodb.core.query.Query.query;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.mongodb.core.MongoOperations;
import org.springframework.data.mongodb.core.query.Update;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Service;

import com.model.Sequence;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;


@Service
@RestController
public class NextSequenceService {
    @Autowired private MongoOperations mongo;


    @RequestMapping("/util/SequenceGenerator")
    public long getNextSequence(@Param("seqName") String seqName)
    {
        Sequence counter = mongo.findAndModify(
                query(where("_id").is(seqName)),
                new Update().inc("seq",1),
                options().returnNew(true).upsert(true),
                Sequence.class);
        Long returnValue = counter.getSeq();
        System.out.println("Sequence Number for " + seqName + ":  " + returnValue);
        return returnValue;
    }
}
