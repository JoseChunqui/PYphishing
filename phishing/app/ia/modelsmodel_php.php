<?php

class Brain {

    public static function predict($atts) {
        if (sizeof($atts) != 12) { return -1; }
    
        $classes = array_fill(0, 2, 0);
            
        if ($atts[3] <= 0.5) {
            if ($atts[1] <= 0.5) {
                if ($atts[11] <= 0.5) {
                    if ($atts[8] <= -0.022727500647306442) {
                        $classes[0] = 0; 
                        $classes[1] = 5; 
                    } else {
                        if ($atts[9] <= 0.5) {
                            if ($atts[6] <= 1.0) {
                                if ($atts[0] <= 0.5) {
                                    if ($atts[8] <= 0.083179503679275513) {
                                        if ($atts[8] <= 0.080322504043579102) {
                                            if ($atts[8] <= 0.035714499652385712) {
                                                $classes[0] = 5; 
                                                $classes[1] = 2; 
                                            } else {
                                                $classes[0] = 2; 
                                                $classes[1] = 0; 
                                            }
                                        } else {
                                            $classes[0] = 0; 
                                            $classes[1] = 1; 
                                        }
                                    } else {
                                        if ($atts[8] <= 0.28348201513290405) {
                                            if ($atts[8] <= 0.19310450553894043) {
                                                if ($atts[8] <= 0.19248449802398682) {
                                                    if ($atts[7] <= 0.5) {
                                                        if ($atts[8] <= 0.1771245002746582) {
                                                            if ($atts[8] <= 0.10620300471782684) {
                                                                if ($atts[8] <= 0.098387002944946289) {
                                                                    $classes[0] = 33; 
                                                                    $classes[1] = 0; 
                                                                } else {
                                                                    if ($atts[8] <= 0.10263150185346603) {
                                                                        $classes[0] = 6; 
                                                                        $classes[1] = 1; 
                                                                    } else {
                                                                        $classes[0] = 4; 
                                                                        $classes[1] = 2; 
                                                                    }
                                                                }
                                                            } else {
                                                                if ($atts[8] <= 0.16515150666236877) {
                                                                    if ($atts[8] <= 0.11437900364398956) {
                                                                        if ($atts[8] <= 0.10960949957370758) {
                                                                            $classes[0] = 21; 
                                                                            $classes[1] = 0; 
                                                                        } else {
                                                                            $classes[0] = 11; 
                                                                            $classes[1] = 1; 
                                                                        }
                                                                    } else {
                                                                        if ($atts[8] <= 0.15122899413108826) {
                                                                            $classes[0] = 180; 
                                                                            $classes[1] = 0; 
                                                                        } else {
                                                                            if ($atts[8] <= 0.15184450149536133) {
                                                                                $classes[0] = 7; 
                                                                                $classes[1] = 1; 
                                                                            } else {
                                                                                $classes[0] = 95; 
                                                                                $classes[1] = 0; 
                                                                            }
                                                                        }
                                                                    }
                                                                } else {
                                                                    if ($atts[8] <= 0.16823899745941162) {
                                                                        $classes[0] = 46; 
                                                                        $classes[1] = 3; 
                                                                    } else {
                                                                        $classes[0] = 57; 
                                                                        $classes[1] = 0; 
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            if ($atts[8] <= 0.17817449569702148) {
                                                                $classes[0] = 3; 
                                                                $classes[1] = 3; 
                                                            } else {
                                                                if ($atts[8] <= 0.19006550312042236) {
                                                                    if ($atts[8] <= 0.18307749927043915) {
                                                                        if ($atts[8] <= 0.18215000629425049) {
                                                                            if ($atts[8] <= 0.17902900278568268) {
                                                                                $classes[0] = 13; 
                                                                                $classes[1] = 1; 
                                                                            } else {
                                                                                if ($atts[8] <= 0.18090900778770447) {
                                                                                    $classes[0] = 2; 
                                                                                    $classes[1] = 0; 
                                                                                } else {
                                                                                    $classes[0] = 35; 
                                                                                    $classes[1] = 1; 
                                                                                }
                                                                            }
                                                                        } else {
                                                                            $classes[0] = 0; 
                                                                            $classes[1] = 1; 
                                                                        }
                                                                    } else {
                                                                        $classes[0] = 56; 
                                                                        $classes[1] = 0; 
                                                                    }
                                                                } else {
                                                                    if ($atts[8] <= 0.19098249077796936) {
                                                                        $classes[0] = 3; 
                                                                        $classes[1] = 1; 
                                                                    } else {
                                                                        if ($atts[8] <= 0.19189849495887756) {
                                                                            $classes[0] = 5; 
                                                                            $classes[1] = 0; 
                                                                        } else {
                                                                            $classes[0] = 13; 
                                                                            $classes[1] = 1; 
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        if ($atts[8] <= 0.16728800535202026) {
                                                            $classes[0] = 2; 
                                                            $classes[1] = 0; 
                                                        } else {
                                                            if ($atts[8] <= 0.17711600661277771) {
                                                                $classes[0] = 0; 
                                                                $classes[1] = 1; 
                                                            } else {
                                                                $classes[0] = 1; 
                                                                $classes[1] = 0; 
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 1; 
                                                }
                                            } else {
                                                if ($atts[8] <= 0.22767150402069092) {
                                                    $classes[0] = 299; 
                                                    $classes[1] = 0; 
                                                } else {
                                                    if ($atts[8] <= 0.22832050919532776) {
                                                        $classes[0] = 1; 
                                                        $classes[1] = 1; 
                                                    } else {
                                                        if ($atts[8] <= 0.2403704971075058) {
                                                            if ($atts[8] <= 0.23971849679946899) {
                                                                $classes[0] = 43; 
                                                                $classes[1] = 0; 
                                                            } else {
                                                                $classes[0] = 6; 
                                                                $classes[1] = 1; 
                                                            }
                                                        } else {
                                                            $classes[0] = 121; 
                                                            $classes[1] = 0; 
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            if ($atts[8] <= 0.28869050741195679) {
                                                $classes[0] = 13; 
                                                $classes[1] = 5; 
                                            } else {
                                                $classes[0] = 35; 
                                                $classes[1] = 0; 
                                            }
                                        }
                                    }
                                } else {
                                    if ($atts[8] <= 0.12548999488353729) {
                                        $classes[0] = 0; 
                                        $classes[1] = 2; 
                                    } else {
                                        if ($atts[8] <= 0.16472899913787842) {
                                            if ($atts[8] <= 0.16139549016952515) {
                                                $classes[0] = 3; 
                                                $classes[1] = 0; 
                                            } else {
                                                $classes[0] = 0; 
                                                $classes[1] = 2; 
                                            }
                                        } else {
                                            if ($atts[8] <= 0.18823549151420593) {
                                                $classes[0] = 4; 
                                                $classes[1] = 0; 
                                            } else {
                                                if ($atts[8] <= 0.21111100912094116) {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 1; 
                                                } else {
                                                    $classes[0] = 4; 
                                                    $classes[1] = 0; 
                                                }
                                            }
                                        }
                                    }
                                }
                            } else {
                                $classes[0] = 2811; 
                                $classes[1] = 0; 
                            }
                        } else {
                            $classes[0] = 0; 
                            $classes[1] = 1; 
                        }
                    }
                } else {
                    if ($atts[0] <= 0.5) {
                        if ($atts[8] <= 0.17439199984073639) {
                            if ($atts[8] <= 0.14564400911331177) {
                                $classes[0] = 2; 
                                $classes[1] = 0; 
                            } else {
                                if ($atts[11] <= 4.0) {
                                    if ($atts[8] <= 0.15450900793075562) {
                                        $classes[0] = 0; 
                                        $classes[1] = 1; 
                                    } else {
                                        $classes[0] = 1; 
                                        $classes[1] = 0; 
                                    }
                                } else {
                                    $classes[0] = 0; 
                                    $classes[1] = 2; 
                                }
                            }
                        } else {
                            $classes[0] = 7; 
                            $classes[1] = 0; 
                        }
                    } else {
                        $classes[0] = 0; 
                        $classes[1] = 8; 
                    }
                }
            } else {
                if ($atts[11] <= 15.0) {
                    if ($atts[6] <= 1.5) {
                        if ($atts[8] <= 0.32467499375343323) {
                            if ($atts[8] <= 0.17108049988746643) {
                                if ($atts[0] <= 0.5) {
                                    if ($atts[11] <= 8.5) {
                                        if ($atts[11] <= 3.5) {
                                            if ($atts[8] <= 0.13100700080394745) {
                                                $classes[0] = 0; 
                                                $classes[1] = 13; 
                                            } else {
                                                if ($atts[8] <= 0.13245600461959839) {
                                                    $classes[0] = 1; 
                                                    $classes[1] = 0; 
                                                } else {
                                                    if ($atts[11] <= 0.5) {
                                                        if ($atts[8] <= 0.15533649921417236) {
                                                            $classes[0] = 0; 
                                                            $classes[1] = 3; 
                                                        } else {
                                                            if ($atts[8] <= 0.15894749760627747) {
                                                                $classes[0] = 1; 
                                                                $classes[1] = 0; 
                                                            } else {
                                                                $classes[0] = 0; 
                                                                $classes[1] = 3; 
                                                            }
                                                        }
                                                    } else {
                                                        $classes[0] = 0; 
                                                        $classes[1] = 21; 
                                                    }
                                                }
                                            }
                                        } else {
                                            if ($atts[11] <= 5.5) {
                                                if ($atts[2] <= 0.5) {
                                                    if ($atts[8] <= 0.16228100657463074) {
                                                        if ($atts[11] <= 4.5) {
                                                            $classes[0] = 0; 
                                                            $classes[1] = 3; 
                                                        } else {
                                                            if ($atts[8] <= 0.15037599205970764) {
                                                                $classes[0] = 1; 
                                                                $classes[1] = 0; 
                                                            } else {
                                                                $classes[0] = 0; 
                                                                $classes[1] = 1; 
                                                            }
                                                        }
                                                    } else {
                                                        $classes[0] = 1; 
                                                        $classes[1] = 0; 
                                                    }
                                                } else {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 3; 
                                                }
                                            } else {
                                                $classes[0] = 0; 
                                                $classes[1] = 4; 
                                            }
                                        }
                                    } else {
                                        if ($atts[8] <= 0.12789100408554077) {
                                            $classes[0] = 1; 
                                            $classes[1] = 0; 
                                        } else {
                                            if ($atts[11] <= 9.5) {
                                                $classes[0] = 1; 
                                                $classes[1] = 0; 
                                            } else {
                                                $classes[0] = 0; 
                                                $classes[1] = 2; 
                                            }
                                        }
                                    }
                                } else {
                                    $classes[0] = 0; 
                                    $classes[1] = 57; 
                                }
                            } else {
                                if ($atts[11] <= 13.5) {
                                    if ($atts[8] <= 0.18834450840950012) {
                                        if ($atts[11] <= 7.5) {
                                            if ($atts[8] <= 0.17534849047660828) {
                                                $classes[0] = 0; 
                                                $classes[1] = 7; 
                                            } else {
                                                if ($atts[7] <= 0.5) {
                                                    if ($atts[0] <= 0.5) {
                                                        $classes[0] = 4; 
                                                        $classes[1] = 0; 
                                                    } else {
                                                        $classes[0] = 0; 
                                                        $classes[1] = 1; 
                                                    }
                                                } else {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 4; 
                                                }
                                            }
                                        } else {
                                            $classes[0] = 2; 
                                            $classes[1] = 0; 
                                        }
                                    } else {
                                        if ($atts[11] <= 0.5) {
                                            if ($atts[8] <= 0.22303900122642517) {
                                                $classes[0] = 1; 
                                                $classes[1] = 0; 
                                            } else {
                                                $classes[0] = 0; 
                                                $classes[1] = 1; 
                                            }
                                        } else {
                                            if ($atts[11] <= 1.5) {
                                                if ($atts[8] <= 0.21666648983955383) {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 4; 
                                                } else {
                                                    if ($atts[8] <= 0.24886350333690643) {
                                                        $classes[0] = 1; 
                                                        $classes[1] = 0; 
                                                    } else {
                                                        $classes[0] = 0; 
                                                        $classes[1] = 1; 
                                                    }
                                                }
                                            } else {
                                                $classes[0] = 0; 
                                                $classes[1] = 21; 
                                            }
                                        }
                                    }
                                } else {
                                    $classes[0] = 1; 
                                    $classes[1] = 0; 
                                }
                            }
                        } else {
                            $classes[0] = 1; 
                            $classes[1] = 0; 
                        }
                    } else {
                        if ($atts[11] <= 4.0) {
                            if ($atts[0] <= 0.5) {
                                $classes[0] = 18; 
                                $classes[1] = 0; 
                            } else {
                                if ($atts[11] <= 1.5) {
                                    $classes[0] = 0; 
                                    $classes[1] = 2; 
                                } else {
                                    $classes[0] = 1; 
                                    $classes[1] = 0; 
                                }
                            }
                        } else {
                            $classes[0] = 0; 
                            $classes[1] = 2; 
                        }
                    }
                } else {
                    if ($atts[11] <= 25.5) {
                        if ($atts[8] <= 0.16045999526977539) {
                            if ($atts[0] <= 0.5) {
                                $classes[0] = 1; 
                                $classes[1] = 0; 
                            } else {
                                $classes[0] = 0; 
                                $classes[1] = 1; 
                            }
                        } else {
                            $classes[0] = 16; 
                            $classes[1] = 0; 
                        }
                    } else {
                        $classes[0] = 102; 
                        $classes[1] = 0; 
                    }
                }
            }
        } else {
            if ($atts[11] <= 28.5) {
                if ($atts[6] <= 1.0) {
                    if ($atts[10] <= 14.5) {
                        if ($atts[1] <= 0.5) {
                            if ($atts[8] <= 0.21320348978042603) {
                                if ($atts[8] <= 0.15184450149536133) {
                                    $classes[0] = 0; 
                                    $classes[1] = 129; 
                                } else {
                                    if ($atts[8] <= 0.15300999581813812) {
                                        $classes[0] = 1; 
                                        $classes[1] = 0; 
                                    } else {
                                        if ($atts[11] <= 0.5) {
                                            if ($atts[8] <= 0.17817449569702148) {
                                                $classes[0] = 0; 
                                                $classes[1] = 18; 
                                            } else {
                                                if ($atts[8] <= 0.17902900278568268) {
                                                    $classes[0] = 1; 
                                                    $classes[1] = 0; 
                                                } else {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 9; 
                                                }
                                            }
                                        } else {
                                            $classes[0] = 0; 
                                            $classes[1] = 43; 
                                        }
                                    }
                                }
                            } else {
                                if ($atts[8] <= 0.23571400344371796) {
                                    if ($atts[10] <= 0.5) {
                                        if ($atts[8] <= 0.22252750396728516) {
                                            $classes[0] = 1; 
                                            $classes[1] = 0; 
                                        } else {
                                            if ($atts[8] <= 0.23205099999904633) {
                                                if ($atts[0] <= 0.5) {
                                                    $classes[0] = 1; 
                                                    $classes[1] = 0; 
                                                } else {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 1; 
                                                }
                                            } else {
                                                $classes[0] = 1; 
                                                $classes[1] = 0; 
                                            }
                                        }
                                    } else {
                                        $classes[0] = 0; 
                                        $classes[1] = 2; 
                                    }
                                } else {
                                    $classes[0] = 0; 
                                    $classes[1] = 16; 
                                }
                            }
                        } else {
                            if ($atts[11] <= 19.5) {
                                if ($atts[8] <= 0.22832050919532776) {
                                    if ($atts[11] <= 2.5) {
                                        $classes[0] = 0; 
                                        $classes[1] = 2212; 
                                    } else {
                                        if ($atts[8] <= 0.16345050930976868) {
                                            $classes[0] = 0; 
                                            $classes[1] = 743; 
                                        } else {
                                            if ($atts[8] <= 0.16378501057624817) {
                                                $classes[0] = 1; 
                                                $classes[1] = 0; 
                                            } else {
                                                if ($atts[11] <= 3.5) {
                                                    if ($atts[8] <= 0.1775209903717041) {
                                                        if ($atts[8] <= 0.17519199848175049) {
                                                            $classes[0] = 0; 
                                                            $classes[1] = 51; 
                                                        } else {
                                                            $classes[0] = 1; 
                                                            $classes[1] = 1; 
                                                        }
                                                    } else {
                                                        $classes[0] = 0; 
                                                        $classes[1] = 88; 
                                                    }
                                                } else {
                                                    $classes[0] = 0; 
                                                    $classes[1] = 415; 
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if ($atts[8] <= 0.2288689911365509) {
                                        if ($atts[0] <= 0.5) {
                                            $classes[0] = 1; 
                                            $classes[1] = 0; 
                                        } else {
                                            $classes[0] = 0; 
                                            $classes[1] = 1; 
                                        }
                                    } else {
                                        $classes[0] = 0; 
                                        $classes[1] = 114; 
                                    }
                                }
                            } else {
                                if ($atts[11] <= 20.5) {
                                    $classes[0] = 1; 
                                    $classes[1] = 0; 
                                } else {
                                    $classes[0] = 0; 
                                    $classes[1] = 19; 
                                }
                            }
                        }
                    } else {
                        if ($atts[10] <= 16.0) {
                            $classes[0] = 1; 
                            $classes[1] = 0; 
                        } else {
                            $classes[0] = 0; 
                            $classes[1] = 4; 
                        }
                    }
                } else {
                    if ($atts[11] <= 0.5) {
                        $classes[0] = 7; 
                        $classes[1] = 0; 
                    } else {
                        if ($atts[0] <= 0.5) {
                            if ($atts[6] <= 3.5) {
                                if ($atts[6] <= 2.5) {
                                    $classes[0] = 0; 
                                    $classes[1] = 3; 
                                } else {
                                    $classes[0] = 1; 
                                    $classes[1] = 0; 
                                }
                            } else {
                                $classes[0] = 0; 
                                $classes[1] = 10; 
                            }
                        } else {
                            $classes[0] = 0; 
                            $classes[1] = 28; 
                        }
                    }
                }
            } else {
                if ($atts[0] <= 0.5) {
                    if ($atts[8] <= 0.20905700325965881) {
                        $classes[0] = 23; 
                        $classes[1] = 0; 
                    } else {
                        if ($atts[8] <= 0.22828748822212219) {
                            $classes[0] = 0; 
                            $classes[1] = 1; 
                        } else {
                            $classes[0] = 4; 
                            $classes[1] = 0; 
                        }
                    }
                } else {
                    if ($atts[11] <= 44.0) {
                        $classes[0] = 0; 
                        $classes[1] = 4; 
                    } else {
                        $classes[0] = 1; 
                        $classes[1] = 0; 
                    }
                }
            }
        }
    
        $class_idx = 0;
        $class_val = $classes[0];
    
        for ($i = 1; $i < 2; $i++) {
            if ($classes[$i] > $class_val) {
                $class_idx = $i;
                $class_val = $classes[$i];
            }
        }
        return $class_idx;
    }

}

if ($argc > 1) {
    array_shift($argv);
    $prediction = Brain::predict($argv);
    fwrite(STDOUT, $prediction);
}
