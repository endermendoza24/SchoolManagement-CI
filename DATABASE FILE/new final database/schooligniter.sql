-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 02:05:11
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `schooligniter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acd_history`
--

CREATE TABLE `acd_history` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `examtype` longtext COLLATE utf8_unicode_ci NOT NULL,
  `group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `board` longtext COLLATE utf8_unicode_ci NOT NULL,
  `passing_yr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `special_mark` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ttl_mark` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acd_session`
--

CREATE TABLE `acd_session` (
  `id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_dt` longtext COLLATE utf8_unicode_ci,
  `is_open` int(1) NOT NULL,
  `strt_dt` date DEFAULT NULL,
  `end_dt` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@mail.com', 'Password@123', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`, `teacher_id`) VALUES
(1, 'English a1-', 'A1-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class_routine`
--

CREATE TABLE `class_routine` (
  `class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dormitory`
--

CREATE TABLE `dormitory` (
  `dormitory_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_paid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `amount_paid`, `due`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 1, 'Mensualidad de mayo', 'El estudiante acaba de pagar la mensualidad del mes de mayo', 20, '20', '0', 1652023620, '', '', '', 'paid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bengali` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `arabic` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dutch` longtext COLLATE utf8_unicode_ci NOT NULL,
  `russian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `chinese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `turkish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `portuguese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hungarian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `french` longtext COLLATE utf8_unicode_ci NOT NULL,
  `greek` longtext COLLATE utf8_unicode_ci NOT NULL,
  `german` longtext COLLATE utf8_unicode_ci NOT NULL,
  `italian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `thai` longtext COLLATE utf8_unicode_ci NOT NULL,
  `urdu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hindi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `latin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `indonesian` longtext COLLATE utf8_unicode_ci NOT NULL,
  `japanese` longtext COLLATE utf8_unicode_ci NOT NULL,
  `korean` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `bengali`, `spanish`, `arabic`, `dutch`, `russian`, `chinese`, `turkish`, `portuguese`, `hungarian`, `french`, `greek`, `german`, `italian`, `thai`, `urdu`, `hindi`, `latin`, `indonesian`, `japanese`, `korean`) VALUES
(1, 'event_schedule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'add_new_teacher', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'forgot_your_password', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'data_added_successfully', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'value_required', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'class', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'data_updated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unread 1 read'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticeboard`
--

CREATE TABLE `noticeboard` (
  `notice_id` int(11) NOT NULL,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `osad_acd_history`
--

CREATE TABLE `osad_acd_history` (
  `id` int(11) NOT NULL,
  `osad_student_id` int(11) NOT NULL,
  `examtype` longtext COLLATE utf8_unicode_ci NOT NULL,
  `group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `board` longtext COLLATE utf8_unicode_ci NOT NULL,
  `passing_yr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `special_mark` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ttl_mark` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `osad_student`
--

CREATE TABLE `osad_student` (
  `id` int(11) NOT NULL,
  `acd_session_id` int(11) NOT NULL,
  `app_sno` int(11) NOT NULL,
  `name_en` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_bn` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gardian_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `technology` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ff_son` int(11) NOT NULL,
  `upjati` int(11) NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pr_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pay_no` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `app_date` date NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_status` int(1) DEFAULT NULL,
  `cur_address` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci,
  `password` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `identdocument` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`payment_id`, `expense_category_id`, `title`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `timestamp`) VALUES
(1, 0, 'Mensualidad de mayo', 'income', 1, 1, '1', 'El estudiante acaba de pagar la mensualidad del mes de mayo', '20', '1652023620');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`section_id`, `name`, `nick_name`, `class_id`, `teacher_id`) VALUES
(1, 'T-1', 'Sala grande', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Talk academia de idiomas'),
(2, 'system_title', 'Talk Management System'),
(3, 'address', 'Antiguo hotel Casa Mateo 1 1/2 cuadra al oeste.'),
(4, 'phone', '+505 8997 1090|'),
(5, 'paypal_email', ''),
(6, 'currency', ''),
(7, 'system_email', 'quierosaberdetalk@gmail.com'),
(20, 'active_sms_service', 'clickatell'),
(11, 'language', ''),
(12, 'text_align', 'left-to-right'),
(13, 'clickatell_user', ''),
(14, 'clickatell_password', ''),
(15, 'clickatell_api_id', ''),
(16, 'skin_colour', 'purple'),
(17, 'twilio_account_sid', ''),
(18, 'twilio_auth_token', ''),
(19, 'twilio_sender_phone_number', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lastname` longtext COLLATE utf8_unicode_ci NOT NULL,
  `identdocument` longtext COLLATE utf8_unicode_ci,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `emergencyphone` longtext COLLATE utf8_unicode_ci,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` int(11) DEFAULT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `diamatricula` longtext COLLATE utf8_unicode_ci,
  `roll` longtext COLLATE utf8_unicode_ci,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `lastname`, `identdocument`, `sex`, `nationality`, `blood_group`, `address`, `phone`, `emergencyphone`, `email`, `password`, `father_name`, `parentesco`, `mother_name`, `class_id`, `section_id`, `parent_id`, `diamatricula`, `roll`, `transport_id`, `dormitory_id`, `dormitory_room_number`) VALUES
(1, 'Endersson ', '24-05-2000', 'Mendoza Muñoz', '041-240500-1004p', 'Male', 'Nicaraguan', '', 'Juzgado 1/2 cuadra al este', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '1', 1, NULL, '1652022136', NULL, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lastname` longtext COLLATE utf8_unicode_ci NOT NULL,
  `identdocument` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci,
  `primerdia` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `lastname`, `identdocument`, `birthday`, `sex`, `nationality`, `blood_group`, `address`, `phone`, `email`, `password`, `primerdia`) VALUES
(1, 'Katherine Cruz', '', '', '06/03/1997', 'Female', '', '', 'Jinotepe, barrio San Juan', '4545454', 'kat@narvaez.com', 'password', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transport`
--

CREATE TABLE `transport` (
  `transport_id` int(11) NOT NULL,
  `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acd_session`
--
ALTER TABLE `acd_session`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indices de la tabla `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`class_routine_id`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indices de la tabla `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`dormitory_id`);

--
-- Indices de la tabla `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indices de la tabla `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indices de la tabla `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indices de la tabla `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indices de la tabla `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indices de la tabla `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indices de la tabla `osad_acd_history`
--
ALTER TABLE `osad_acd_history`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `osad_student`
--
ALTER TABLE `osad_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acd_session_id` (`acd_session_id`);

--
-- Indices de la tabla `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indices de la tabla `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indices de la tabla `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acd_session`
--
ALTER TABLE `acd_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `dormitory_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `osad_acd_history`
--
ALTER TABLE `osad_acd_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `osad_student`
--
ALTER TABLE `osad_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `osad_student`
--
ALTER TABLE `osad_student`
  ADD CONSTRAINT `osad_student_ibfk_1` FOREIGN KEY (`acd_session_id`) REFERENCES `acd_session` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
