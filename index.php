$json = json_encode([
                    'speech'   => $speech,
                    'displayText' => $text,
                    'data' => [],
                    'contextOut' => [$context],
                    'source' => $source
            ]);
