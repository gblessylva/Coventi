@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/export-plural-rules
php "%BIN_TARGET%" %*
