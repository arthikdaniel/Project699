package com;


import com.dto.ContactInfo;
import com.dto.Guardian;
import com.dto.RankScore;
import com.fasterxml.jackson.core.type.TypeReference;
import com.model.*;
import com.repo.*;
import com.dto.AttendanceSummary;
import com.util.DateUtils;
import com.util.NextSequenceService;
import org.json.JSONArray;
import org.json.JSONException;
import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;
import org.springframework.test.context.web.WebAppConfiguration;

import java.io.File;
import java.io.IOException;
import java.time.LocalDate;
import java.util.*;

import static org.hibernate.validator.internal.util.Contracts.assertNotNull;
import static org.junit.Assert.assertEquals;

import com.fasterxml.jackson.databind.ObjectMapper;


@RunWith(SpringRunner.class)
@SpringBootTest(classes = Application.class)
@WebAppConfiguration
public class AggregationApplicationTests {

    @Autowired
    private AttendanceRepository attendanceRepository;

    @Autowired
    private IStudentRepo studentRepo;

    @Autowired
    private ICourseRepo courseRepo;

    @Autowired
    private LoginRepo loginRepo;

    @Autowired
    private IPaymentRepo paymentRepo;

    @Autowired
    NextSequenceService nextSequenceService;

    @Autowired
    MessageRepo messageRepo;

    @Autowired
    SequenceRepo sequenceRepo;

    @Before
    public void setUp() {
//        courseRepo.deleteAll();
//        studentRepo.deleteAll();
//        attendanceRepository.deleteAll();
//        loginRepo.deleteAll();
//        messageRepo.deleteAll();
//        sequenceRepo.deleteAll();
    }

    @Test
    public void contextLoads() {
    }

    @Test
    public void saveCourses() {
        courseRepo.save(new Course("C001", "WHITE", new Date(), new Date(), 25));
        courseRepo.save(new Course("C002", "GREEN", new Date(), new Date(), 15));
        courseRepo.save(new Course("C003", "BLUE", new Date(), new Date(), 15));

    }


    @Test
    public void testSaveLogins() {

        loginRepo.save(new Login("ST00001", "password", "student"));
        loginRepo.save(new Login("ST00002", "password", "student"));
        loginRepo.save(new Login("ST00003", "password", "student"));
        loginRepo.save(new Login("admin", "password", "admin"));


    }

    @Test
    public void saveAllFirstTestRecords() throws IOException {
        //Delete all Records
        setUpNew();
        //Insert Courses Master Table
        testSaveCourseWithSequenceNo();
        //Insert Students
        testSaveStudentWithSequenceNo();
        //Insert Logins
        testSaveLogins();
        //Insert Student Attendance
        testSaveAttendanceWithSequenceNo();
        //Insert Student Payments
        testSavePaymentsWithSequenceNo();
        //Insert Student Messages
        testSaveMessageWithSequenceNo();

    }


    private void setUpNew() {
        courseRepo.deleteAll();
        studentRepo.deleteAll();
        attendanceRepository.deleteAll();
        loginRepo.deleteAll();
        messageRepo.deleteAll();
        sequenceRepo.deleteAll();
    }

    @Test
    public void saveStudents() {

        Student student;
        for (int i = 0; i < 1; i++) {
            student = saveStudent("ST" + i);
            studentRepo.save(student);
        }
    }

    @Test
    public void findById() {

        Attendance attendance = new Attendance("AT1", "ST0", "C001", new Date(), 2, "");
        attendanceRepository.save(attendance);
        Optional<Attendance> foundProduct = attendanceRepository.findById("AT1");
        System.out.println(foundProduct);
        assertNotNull(foundProduct);
    }

    @Test
    public void aggregateAttendance() {

        saveAttendances("ST0", "C001", "C002");
        List<AttendanceSummary> attendanceSummaries = attendanceRepository.getSummaryAggregateByStudentId("ST0");
        assertEquals(2, attendanceSummaries.size());
        AttendanceSummary sqlCourses = getStudentAttendance(attendanceSummaries, "C002");
        assertEquals(8.5, sqlCourses.getTotalHours(), 0.01);
        System.out.println(attendanceSummaries);
    }


    @Test
    public void testSaveCourseWithSequenceNo() throws IOException {

        courseRepo.deleteAll();

        ObjectMapper mapper = new ObjectMapper();
        List<Course> myCourses =
                mapper.readValue(new File("/Users/arthik.daniel/Dropbox/Project699/SpringData/src/test/resources/courses.json"),
                        new TypeReference<List<Course>>() {
                        });

        for (Course course : myCourses) {
            String courseId = "C" + String.format("%05d", nextSequenceService.getNextSequence("course"));
            System.out.println("Course ID : " + courseId);

            course.setCourseId(courseId);
            courseRepo.save(course);
        }
    }






    @Test
    public void testSaveStudentWithSequenceNo() throws IOException {

        studentRepo.deleteAll();

        ObjectMapper mapper = new ObjectMapper();
        List<Student> myStudents =
                mapper.readValue(new File("/Users/arthik.daniel/Dropbox/Project699/SpringData/src/test/resources/students.json"),
                        new TypeReference<List<Student>>() {
                        });

        for (Student student : myStudents) {
            String studentId = "ST" + String.format("%05d", nextSequenceService.getNextSequence("student"));
            System.out.println("Student ID : " + studentId);

            student.setStudentId(studentId);
            studentRepo.save(student);
        }
    }


    @Test
    public void testSavePaymentsWithSequenceNo() {
        paymentRepo.deleteAll();
        paymentRepo.save(new Payment(generateSequenceNo("P", "payment"), "ST00001",
                new Date(), 53.40, "White Belt Fees"));
        paymentRepo.save(new Payment(generateSequenceNo("P", "payment"), "ST00002",
                new Date(), 53.40, "White Belt Fees"));
        paymentRepo.save(new Payment(generateSequenceNo("P", "payment"), "ST00003",
                new Date(), 53.40, "White Belt Fees"));
        paymentRepo.save(new Payment(generateSequenceNo("P", "payment"), "admin",
                new Date(), 53.40, "White Belt Fees"));


    }



    @Test
    public void testSaveMessageWithSequenceNo() throws IOException {

        messageRepo.deleteAll();

        ObjectMapper mapper = new ObjectMapper();
        List<Message> myList =
                mapper.readValue(new File("/Users/arthik.daniel/Dropbox/Project699/SpringData/src/test/resources/messages.json"),
                        new TypeReference<List<Message>>() {
                        });

        for (Message message : myList) {
            String id = "M" + String.format("%05d", nextSequenceService.getNextSequence("message"));
            System.out.println("Message ID : " + id);
            message.setMessageId(id);
            messageRepo.save(message);
        }




    }

    private String generateSequenceNo(String prefix, String seqName) {
        return prefix + String.format("%05d", nextSequenceService.getNextSequence(seqName));
    }

    @Test
    public void testSaveAttendanceWithSequenceNo() throws IOException {

        attendanceRepository.deleteAll();

        ObjectMapper mapper = new ObjectMapper();
        List<Attendance> myAttendances =
                mapper.readValue(new File("/Users/arthik.daniel/Dropbox/Project699/SpringData/src/test/resources/attendances.json"),
                        new TypeReference<List<Attendance>>() {
                        });

        for (Attendance attendance : myAttendances) {
            //get Student and check if Course is enrolled
            Optional<Student> student = studentRepo.findById(attendance.getStudentId());
            System.out.println(student);
            Optional<Course> course = courseRepo.findById(attendance.getCourseId());
            System.out.println(course);
            if (student.isPresent() && course.isPresent()) {
                Student st = student.get();
                Course c = course.get();
                if (student.get().getCourse_ids() != null) {
                    for (int i = 0; i < st.getCourse_ids().size(); i++) {
                        if (st.getCourse_ids().get(i).getCourseId().equalsIgnoreCase(c.getCourseId())) {
                            String attendanceId = "AT" + String.format("%05d", nextSequenceService.getNextSequence("attendance"));
                            System.out.println("Attendance ID : " + attendanceId);

                            attendance.setAttendanceId(attendanceId);
                            attendanceRepository.save(attendance);
                            break;
                        } else {
                            System.out.println("Wrong Info : " + student + course);
                        }
                    }
                } else {
                    System.out.println("Course not assigned to Student " + student);

                    student.get().setCourse_ids(new ArrayList<Course>() {{
                        add(course.get());
                    }});
                    studentRepo.save(student.get());
                    System.out.println("Course assigned to Student");
                }
            } else {
                System.out.println("Wrong Info : " + student + course);
            }


        }
    }

    private Student saveStudent(String id) {

        ContactInfo contactInfo = new ContactInfo(id + " Addr Line 1", " Apt No " + id,
                "Windsor", "Ontario", "Canada", id + "@gmail.com", id + "837292", "http://linkedin.com/" + id);

        List<Guardian> guardians = new ArrayList<Guardian>();
        guardians.add(new Guardian("Antony" + id, "Das" + id, contactInfo));
        guardians.add(new Guardian("Daniel" + id, "Ramani" + id, contactInfo));

        List<Course> coursesEnrolled = new ArrayList<Course>();
        coursesEnrolled.add(new Course("C001", "JAVA", new Date(), new Date(), 25));
        coursesEnrolled.add(new Course("C002", "SQL", new Date(), new Date(), 15));

        List<RankScore> ranks = new ArrayList<RankScore>();
        ranks.add(new RankScore("Green", new Date(), ""));
        ranks.add(new RankScore("Brown", new Date(), ""));
        ranks.add(new RankScore("Blue", null, ""));

        Student student = new Student(id, "Arthik Daniel" + id, "Das" + id, DateUtils.asDate(LocalDate.of(1981, 12, 18)),
                coursesEnrolled, contactInfo, guardians, ranks);
        return student;
    }

    @Test
    public void updateStudentContactInfo() {

        ContactInfo contactInfo;

        for (Student student : studentRepo.findAll()) {
            String id = student.getStudentId();
            contactInfo = new ContactInfo("Apt No" + id, id + "Ouellette Avenue",
                    "Windsor", "ON", "Canada", id + "@gmail.com", id + "837292", "http://linkedin.com/" + id);
            student.setContactInfo(contactInfo);
            studentRepo.save(student);

        }
    }

    private void saveAttendances(String st0, String c0, String c1) {
        attendanceRepository.save(new Attendance("AT2", st0, c0, new Date(), 2, ""));
        attendanceRepository.save(new Attendance("AT3", st0, c0, new Date(), 2.5, ""));
        attendanceRepository.save(new Attendance("AT4", st0, c1, new Date(), 3.5, ""));
        attendanceRepository.save(new Attendance("AT5", st0, c1, new Date(), 1, ""));
        attendanceRepository.save(new Attendance("AT6", st0, c0, new Date(), 1.5, ""));
        attendanceRepository.save(new Attendance("AT7", st0, c1, new Date(), 4, ""));
    }

    private AttendanceSummary getStudentAttendance(List<AttendanceSummary> attendanceSummaries, String c1) {
        return attendanceSummaries.stream().filter(attendance -> c1.equals(attendance.getCourseId())).findAny().get();
    }


}