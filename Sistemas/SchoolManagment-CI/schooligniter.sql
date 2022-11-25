-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2022 a las 16:21:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'admin', 'admin@mail.com', 'carazo12', '1'),
(2, 'Joel Vasquez', 'joel@talk.com', 'password', '1');

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

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `status`, `student_id`, `date`) VALUES
(1, 1, 2, '2022-05-09'),
(2, 2, 3, '2022-05-09'),
(3, 3, 4, '2022-05-09'),
(4, 1, 2, '2022-05-11'),
(5, 1, 3, '2022-05-11'),
(6, 2, 4, '2022-05-11'),
(7, 2, 5, '2022-05-11'),
(8, 2, 6, '2022-05-11'),
(9, 3, 7, '2022-05-11'),
(10, 3, 9, '2022-05-12'),
(11, 1, 2, '2022-05-12'),
(12, 1, 3, '2022-05-12'),
(13, 1, 4, '2022-05-12'),
(14, 1, 5, '2022-05-12'),
(15, 2, 6, '2022-05-12'),
(16, 1, 7, '2022-05-12'),
(17, 3, 8, '2022-05-12'),
(18, 1, 9, '2022-05-13'),
(19, 0, 2, '2022-05-13'),
(20, 0, 3, '2022-05-13'),
(21, 0, 4, '2022-05-13'),
(22, 0, 5, '2022-05-13'),
(23, 0, 6, '2022-05-13'),
(24, 0, 7, '2022-05-13'),
(25, 0, 8, '2022-05-13'),
(26, 1, 2, '2022-05-20'),
(27, 1, 3, '2022-05-20'),
(28, 1, 4, '2022-05-20'),
(29, 1, 5, '2022-05-20'),
(30, 2, 6, '2022-05-20'),
(31, 3, 7, '2022-05-20'),
(32, 2, 8, '2022-05-20'),
(33, 1, 1, '2022-05-21'),
(34, 1, 2, '2022-05-21'),
(35, 1, 3, '2022-05-21'),
(36, 2, 4, '2022-05-21'),
(37, 1, 1, '2022-05-22'),
(38, 1, 2, '2022-05-22'),
(39, 1, 3, '2022-05-22'),
(40, 2, 245, '2022-05-22'),
(41, 1, 246, '2022-05-22'),
(42, 2, 247, '2022-05-22'),
(43, 3, 248, '2022-05-22'),
(44, 2, 249, '2022-05-22'),
(45, 1, 250, '2022-05-22'),
(46, 2, 1, '2022-05-12'),
(47, 1, 245, '2022-05-12'),
(48, 3, 246, '2022-05-12'),
(49, 2, 247, '2022-05-12'),
(50, 2, 248, '2022-05-12'),
(51, 1, 249, '2022-05-12'),
(52, 3, 250, '2022-05-12'),
(53, 2, 243, '2022-05-12'),
(54, 2, 244, '2022-05-12'),
(55, 0, 1, '2025-01-01'),
(56, 0, 2, '2025-01-01'),
(57, 0, 3, '2025-01-01'),
(58, 0, 245, '2025-01-01'),
(59, 0, 246, '2025-01-01'),
(60, 0, 247, '2025-01-01'),
(61, 0, 248, '2025-01-01'),
(62, 0, 249, '2025-01-01'),
(63, 0, 250, '2025-01-01'),
(64, 1, 251, '2022-05-22'),
(65, 1, 1, '2022-05-24'),
(66, 2, 2, '2022-05-24'),
(67, 2, 3, '2022-05-24'),
(68, 2, 245, '2022-05-24'),
(69, 2, 246, '2022-05-24'),
(70, 3, 247, '2022-05-24'),
(71, 3, 248, '2022-05-24'),
(72, 3, 249, '2022-05-24'),
(73, 3, 250, '2022-05-24'),
(74, 3, 251, '2022-05-24'),
(75, 2, 1, '2022-04-24'),
(76, 2, 2, '2022-04-24'),
(77, 2, 3, '2022-04-24'),
(78, 2, 245, '2022-04-24'),
(79, 2, 246, '2022-04-24'),
(80, 2, 247, '2022-04-24'),
(81, 2, 248, '2022-04-24'),
(82, 2, 249, '2022-04-24'),
(83, 2, 250, '2022-04-24'),
(84, 2, 251, '2022-04-24'),
(85, 2, 1, '2022-05-25'),
(86, 1, 2, '2022-05-25'),
(87, 1, 3, '2022-05-25'),
(88, 1, 245, '2022-05-25'),
(89, 1, 246, '2022-05-25'),
(90, 2, 247, '2022-05-25'),
(91, 1, 248, '2022-05-25'),
(92, 1, 249, '2022-05-25'),
(93, 1, 250, '2022-05-25'),
(94, 1, 251, '2022-05-25'),
(95, 1, 252, '2022-05-25'),
(96, 2, 243, '2022-05-25'),
(97, 3, 244, '2022-05-25'),
(98, 1, 1, '2022-05-26'),
(99, 1, 2, '2022-05-26'),
(100, 1, 3, '2022-05-26'),
(101, 1, 245, '2022-05-26'),
(102, 1, 246, '2022-05-26'),
(103, 1, 247, '2022-05-26'),
(104, 3, 248, '2022-05-26'),
(105, 2, 249, '2022-05-26'),
(106, 1, 250, '2022-05-26'),
(107, 1, 251, '2022-05-26'),
(108, 2, 252, '2022-05-26');

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

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3d7c1ba1d1c44a410ede61dee5e4168c7b817a8a', '::1', 1652482036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323438313830333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2261646d696e223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('46a6e307801120799573e008c780273edde9df70', '::1', 1652483276, ''),
('7c6ca3c5af66b6181083e0dbbb19179d40a6a3e7', '::1', 1652478672, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437383630393b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2261646d696e223b6c6f67696e5f747970657c733a353a2261646d696e223b666c6173685f6d6573736167657c733a31323a224d6573736167652053656e74223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226f6c64223b7d);

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
(1, 'English A1-', 'A1-', 1),
(2, 'English A2+', 'English A2+', 1);

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

--
-- Volcado de datos para la tabla `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `subject_id`, `time_start`, `time_end`, `day`) VALUES
(1, 2, 2, 8, 9, 'Sabado');

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

--
-- Volcado de datos para la tabla `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `date`, `comment`) VALUES
(1, 'Evaluación 1', '05/09/2022', 'This examen would be write'),
(2, 'Evaluación 2', '05/12/2022', 'This exam is fatal'),
(3, 'Evaluación 3', '05/12/2022', 'Good exam'),
(4, 'Evaluación 4', '22-05-2022', 'Examen escrito'),
(5, 'Evaluación 5', '22-05-2022', 'Examen escrito'),
(6, 'Evaluación 6', '22-05-2022', 'Examen escrito'),
(7, 'Evaluación 7', '22-05-2022', 'Examen escrito'),
(8, 'Evaluación 9', '22-05-2022', 'Examen escrito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `expense_category`
--

INSERT INTO `expense_category` (`expense_category_id`, `name`) VALUES
(1, 'Equipamiento de aulas'),
(2, 'Comida'),
(3, 'Otros');

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

--
-- Volcado de datos para la tabla `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(3, 'A', '100', 80, 100, 'Estudiante aprobado'),
(4, 'Ao', '100', 0, 79, 'Estudiante reprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `student_id` int(11) NOT NULL,
  `quienpaga` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'Mismo estudiante',
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_paid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  `baucher` longtext COLLATE utf8_unicode_ci,
  `metodopago` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipopago` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_factura` int(20) DEFAULT '1',
  `corte` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `quienpaga`, `title`, `description`, `amount`, `amount_paid`, `due`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`, `baucher`, `metodopago`, `tipopago`, `num_factura`, `corte`) VALUES
(00033, 243, '', 'Cancelacion', 'Julio', 750, '750', '0', 1653153420, '', '1', '', 'paid', NULL, '1', 'Mensualidad', 1, 'vespertino'),
(00035, 252, '', 'Cancelacion', 'Reprogramación certificado CEFR A1+', 40, '40', '0', 1653467820, '', '1', '', 'paid', NULL, '1', 'certificacionReprogramacion', 1, 'matutino'),
(00036, 248, '', 'Cancelacion', 'otro', 105487, '105487', '0', 1653480180, '', '1', '', 'paid', NULL, '1', 'otros', 1, 'vespertino');

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
(7, 'data_updated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'manage_exam_marks', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'manage_invoice/payment', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'manage_teacher', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'manage_subject', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'manage_class_routine', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'study_material', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'manage_profile', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'account_updated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'payment_successfull', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'manage_daily_attendance', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'add_student', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'student_information', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'student_marksheet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'data_deleted', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'theme_selected', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'message_sent', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'password_mismatch', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'private_messaging', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'message_sent!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'password_updated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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

--
-- Volcado de datos para la tabla `mark`
--

INSERT INTO `mark` (`mark_id`, `student_id`, `subject_id`, `class_id`, `exam_id`, `mark_obtained`, `mark_total`, `comment`) VALUES
(1, 2, 1, 1, 1, 100, 100, 'Tiene que mejorar'),
(2, 3, 1, 1, 1, 90, 100, ''),
(3, 4, 1, 1, 1, 78, 100, ''),
(4, 2, 1, 1, 2, 90, 100, ''),
(5, 3, 1, 1, 2, 90, 100, ''),
(6, 4, 1, 1, 2, 0, 100, ''),
(7, 5, 1, 1, 2, 0, 100, ''),
(8, 6, 1, 1, 2, 0, 100, ''),
(9, 7, 1, 1, 2, 0, 100, ''),
(10, 8, 1, 1, 2, 0, 100, ''),
(11, 2, 1, 1, 3, 0, 100, ''),
(12, 3, 1, 1, 3, 0, 100, ''),
(13, 4, 1, 1, 3, 0, 100, ''),
(14, 5, 1, 1, 3, 0, 100, ''),
(15, 6, 1, 1, 3, 0, 100, ''),
(16, 7, 1, 1, 3, 0, 100, ''),
(17, 8, 1, 1, 3, 0, 100, ''),
(18, 9, 2, 2, 3, 89, 100, ''),
(19, 9, 2, 2, 1, 87, 100, ''),
(20, 5, 1, 1, 1, 50, 100, ''),
(21, 6, 1, 1, 1, 0, 100, ''),
(22, 7, 1, 1, 1, 0, 100, ''),
(23, 8, 1, 1, 1, 0, 100, ''),
(24, 1, 4, 2, 1, 50, 100, ''),
(25, 2, 4, 2, 1, 0, 100, ''),
(26, 3, 4, 2, 1, 0, 100, ''),
(27, 245, 4, 2, 1, 0, 100, ''),
(28, 246, 4, 2, 1, 0, 100, ''),
(29, 247, 4, 2, 1, 0, 100, ''),
(30, 248, 4, 2, 1, 0, 100, ''),
(31, 249, 4, 2, 1, 0, 100, ''),
(32, 250, 4, 2, 1, 0, 100, ''),
(33, 251, 4, 2, 1, 0, 100, ''),
(34, 1, 2, 2, 1, 70, 100, 'good'),
(35, 2, 2, 2, 1, 78, 100, ''),
(36, 3, 2, 2, 1, 0, 100, ''),
(37, 245, 2, 2, 1, 0, 100, ''),
(38, 246, 2, 2, 1, 0, 100, ''),
(39, 247, 2, 2, 1, 0, 100, ''),
(40, 248, 2, 2, 1, 0, 100, ''),
(41, 249, 2, 2, 1, 0, 100, ''),
(42, 250, 2, 2, 1, 0, 100, ''),
(43, 251, 2, 2, 1, 0, 100, ''),
(44, 252, 2, 2, 1, 0, 100, ''),
(45, 1, 3, 2, 1, 77, 100, ''),
(46, 2, 3, 2, 1, 0, 100, ''),
(47, 3, 3, 2, 1, 0, 100, ''),
(48, 245, 3, 2, 1, 0, 100, ''),
(49, 246, 3, 2, 1, 0, 100, ''),
(50, 247, 3, 2, 1, 0, 100, ''),
(51, 248, 3, 2, 1, 0, 100, ''),
(52, 249, 3, 2, 1, 0, 100, ''),
(53, 250, 3, 2, 1, 0, 100, ''),
(54, 251, 3, 2, 1, 0, 100, ''),
(55, 252, 3, 2, 1, 0, 100, ''),
(56, 252, 4, 2, 1, 0, 100, '');

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

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`message_id`, `message_thread_code`, `message`, `sender`, `timestamp`, `read_status`) VALUES
(1, 'dbe5b01a7d8c428', 'hi', 'student-1', '1653180664', 0);

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

--
-- Volcado de datos para la tabla `message_thread`
--

INSERT INTO `message_thread` (`message_thread_id`, `message_thread_code`, `sender`, `reciever`, `last_message_timestamp`) VALUES
(1, 'dbe5b01a7d8c428', 'student-1', 'admin-1', '');

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

--
-- Volcado de datos para la tabla `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'Examinación CFR nivel A1-', 'Dear teachers, the CFR examination is coming.', 1652220000),
(2, 'Fin de nivel', 'Se acaba el nivel muy pronto', 1652392800),
(3, 'Entrega de certificados A1-', 'Se entregaran los certificados a los estudiantes de la mañana', 1653343200);

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
  `lastname` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci,
  `password` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci,
  `identdocument` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parent`
--

INSERT INTO `parent` (`parent_id`, `name`, `lastname`, `email`, `password`, `phone`, `address`, `nationality`, `identdocument`) VALUES
(1, 'Ernesto', 'Guevara Herández', 'endermendoza12@gmail.com', NULL, '82072291', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 'Nicaragüense', '041-240500-1004P'),
(2, 'Yahaira Dayana', 'Ruiz Diaz', 'yahaira@email.com', NULL, '12457896', 'Barrio San Antonio, Jinotepe', 'Nicaraguan', '041-240500-1004P');

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
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `corte` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`payment_id`, `expense_category_id`, `title`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `timestamp`, `corte`) VALUES
(31, 3, 'Pizza', 'Salida', 0, 0, '1', 'Milos pizzeria', '250', '1653247080', 'Vespertino'),
(32, 0, 'Cancelacion', 'Entrada', 34, 252, '1', 'Certificado CEFR A1-', '40', '1653466920', 'vespertino'),
(33, 0, 'Cancelacion', 'Entrada', 35, 252, '1', 'Reprogramación certificado CEFR A1+', '40', '1653467820', 'matutino'),
(34, 0, 'Cancelacion', 'Entrada', 36, 248, '1', 'otro', '105487', '1653480180', 'vespertino');

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
(1, 'Wave 5', 'Sala grande', 1, 1),
(2, 'Wave 4', 'Sala de en medio', 1, 1);

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
(1, 'system_name', 'Talk | Academia de idiomas'),
(2, 'system_title', 'Talk | Academia de idiomas'),
(3, 'address', 'Del Am/Pm 3 1/2 cuadras al oeste. Jinotepe, Carazo'),
(4, 'phone', '+505 8997 1090'),
(5, 'paypal_email', ''),
(6, 'currency', ''),
(7, 'system_email', 'quierosaberdetalk@gmail.com'),
(20, 'active_sms_service', 'clickatell'),
(11, 'language', ''),
(12, 'text_align', 'left-to-right'),
(13, 'clickatell_user', ''),
(14, 'clickatell_password', ''),
(15, 'clickatell_api_id', ''),
(16, 'skin_colour', 'black'),
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
  `wave` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` longtext COLLATE utf8_unicode_ci,
  `horario` longtext COLLATE utf8_unicode_ci,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipo_documento` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreemergencia` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidoemergencia` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccionemergencia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relacionemergencia` int(11) DEFAULT NULL,
  `telefonoemergencia` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailemergencia` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `lastname`, `identdocument`, `sex`, `nationality`, `blood_group`, `address`, `phone`, `emergencyphone`, `email`, `password`, `father_name`, `parentesco`, `mother_name`, `class_id`, `section_id`, `parent_id`, `diamatricula`, `wave`, `level`, `horario`, `transport_id`, `dormitory_id`, `dormitory_room_number`, `tipo_documento`, `nombreemergencia`, `apellidoemergencia`, `direccionemergencia`, `relacionemergencia`, `telefonoemergencia`, `emailemergencia`, `imagen`) VALUES
(1, 'Endersson Alonso', '06/18/2024', 'Mendoza Muñoz', '041-240500-1004P', 'Male', 'Nicaragüense', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', 'carazo12', '', 0, '', '2', NULL, NULL, '1653056631', 'Wave 1', 'A1+', '1', 0, 0, '', 'Cedula', 'Janerys', 'Lezama', 'El Rosario', 1, '82072291', 'janylez@gmail.com', NULL),
(2, 'Oswald Armando ', '04/29/2022', 'Balladares Ruiz', '457-875152-4584584', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653062342', 'Wave 1', 'A1+', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(3, 'Oswald Armando ', '06/18/2024', 'Balladares Ruiz', '041-240500-1004P', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653062400', 'Wave 1', 'A1+', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(243, 'Flavia Lucia', '04/29/2022', 'Almendarez García', '257-946351-7656', 'Female', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '1', NULL, NULL, '1653151636', 'Wave 1', 'A2+', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(244, 'Gloroa Lucoa', '04/29/2022', 'Espinoza Perez', '457812596', 'Male', 'Nicaragua', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '1', NULL, NULL, '1653153245', 'Wave 1', 'A2-', '4', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(245, 'Gustavo jose ', '04/19/2022', 'guevara hernandez', '041-240500-1004P', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653153565', 'Wave 1', 'A2-', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(246, 'Anielka petronila ', '04/29/2022', 'diaz', '777-777777-77', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653153940', 'Wave 1', 'A1+', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(247, 'daniel', '06/18/2024', 'mendieta', '777-777777-77', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653154147', 'Wave 1', 'B2+', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(248, 'Omar Rene', '11/26/2019', 'Rodriguez Vasquez', '041-240500-1004P', 'Male', 'nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653155419', 'Wave 1', 'A1-', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(249, 'Derek William', '11/26/2019', 'Palacios Cortez', '041-240500-1004P', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653155566', 'Wave 1', 'A2+', '2', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 3, '82072291', 'endermendoza12@gmail.com', NULL),
(250, 'Gerald Josue ', '06/18/2024', 'mendieta', '041-240500-1004P', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653155949', 'Wave 1', '0', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(251, 'Alonso', '06/18/2024', 'Muñoz', '041-240500-1004P', 'Male', 'Nicaraguan', '', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', '82072291', NULL, 'endermendoza12@gmail.com', '', '', 0, '', '2', NULL, NULL, '1653204659', 'Wave 1', 'A2+', '1', 0, 0, '', 'Cedula', 'Endersson', 'Mendoza', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL),
(252, 'Diandra Dayamar', '11/26/2019', 'Balladares Ruiz', '471-596401-4848545m', 'Femenino', 'Nicaraguense', '', 'Florid', '82072291', '82072291', 'endermendoza12@gmail.com', '', '', 1, '', '2', NULL, 2, '1653465401', 'Wave 2', 'A2+', '3', 0, 0, '', 'Cedula', 'Endersson Alonso', 'Mendoza Muñoz', 'ZONA CENTRAL SECTOR N°3 JUZGADO 1/2 CUADRA AL ESTE', 1, '82072291', 'endermendoza12@gmail.com', NULL);

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

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(1, 'Unidad 1', 1, 1),
(2, 'Simple past', 2, 1),
(3, 'Did and dident', 2, 1),
(4, 'Conditionals', 2, 1);

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
(1, 'Katherine Cruz', '', '', '06/03/1997', 'Female', '', '', 'Jinotepe, barrio San Juan', '4545454', 'kat@narvaez.com', 'password', NULL),
(2, 'Lenin Olivas ', 'Olivas', '025-144789O', '28-05-1997', 'Male', 'Nicaraguan', 'O+', 'Managua', '5555555', 'lenin@olivas.com', 'password', NULL);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
