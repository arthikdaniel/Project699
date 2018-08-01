package com.util;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;

public class JSONUtil {

    public static JSONObject parseJSONFile(String filename) throws JSONException, IOException {
        String content = new String(Files.readAllBytes(Paths.get(filename)));
        return new JSONObject(content);
    }

    public static void main(String[] args) throws IOException, JSONException {
        String filename = "path/to/file/abc.json";
        JSONObject jsonObject = parseJSONFile(filename);

        //do anything you want with jsonObject
    }
}