CREATE TABLE tx_unitylinks_domain_model_storage (
    name VARCHAR(50) NOT NULL DEFAULT '',
	description TEXT,
	links TEXT,
	user INT(11) NOT NULL,
	profile_image int(11) unsigned DEFAULT '0' NOT NULL,
	header_image int(11) unsigned DEFAULT '0' NOT NULL,
	thema int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_unitylinks_domain_model_link (
    title VARCHAR(50) NOT NULL DEFAULT '',
    href VARCHAR(255) NOT NULL DEFAULT '',
	storage INT(11) NOT NULL
);
