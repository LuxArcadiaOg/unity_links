CREATE TABLE tx_unitylinks_domain_model_storage
(
	name          VARCHAR(50)      DEFAULT ''  NOT NULL,
	description   TEXT,
	user          INT(11)                      NOT NULL,
	profile_image INT(11) UNSIGNED DEFAULT 0 NOT NULL,
	header_image  INT(11) UNSIGNED DEFAULT 0 NOT NULL,
	thema         INT(11) UNSIGNED DEFAULT 0 NOT NULL,
	links         INT(11) UNSIGNED DEFAULT 0 NOT NULL
);

CREATE TABLE tx_unitylinks_domain_model_link
(
	title   VARCHAR(255) DEFAULT ''  NOT NULL,
	href    VARCHAR(255) DEFAULT ''  NOT NULL,
	storage INT(11)      DEFAULT 0 NOT NULL
);
