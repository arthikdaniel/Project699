package com.model;

import org.springframework.data.annotation.Id;

public class Sequence {
    @Id
    private String id;

    private long seq;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public long getSeq() {
        return seq;
    }

    public void setSeq(long seq) {
        this.seq = seq;
    }

    public Sequence() {
    }

    public Sequence(String id, long seq) {
        this.id = id;
        this.seq = seq;
    }
}
